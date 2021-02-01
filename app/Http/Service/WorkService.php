<?php


namespace App\Http\Service;


use App\Models\Category;
use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WorkService
{
    public function getAll()
    {
        return Work::orderByDesc("created_at")->get();
    }

    public function getWorksByUserId($user_id)
    {
        return Work::where('user_id', '=', $user_id)->orderByDesc('created_at')->get();
    }
    public function getWorksByCategories(Work $work)
    {
        $workCategories = $work->categories()->with('works', function($q) use($work){
            $q->where('id', '!=', $work->getId())->orderByDesc('created_at')->limit(20);
        })->get();
        $works = new Collection();
        foreach($workCategories as $workCategory){
            $works = $works->merge($workCategory->works);
        }

       return $works;

    }
    public function getAllCategories()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $this->validateWork($request);
        $work = new Work();
        $work->setTitle($request->input('title'));
        $work->setUserId($request->input('user_id'));
        $work->setExpDate($request->input('exp_date'));
        $work->setDescription($request->input('description'));
        $work->setPrice($request->input('price'));
        $work->setContacts($request->input('contacts'));
        $work->setAddress($request->input('address'));
        $work->setTimeToWork($request->input('time_to_work'));
        $work->save();
        return $work->categories()->attach($request->subcategory_id);
    }

    public function update(Request $request, $work_id)
    {
        $this->validateWork($request);
        $work = Work::find($work_id);
        $work->setTitle($this->htmlFilter($request->input('title')));
        $work->setUserId($request->input('user_id'));
        $work->setExpDate($request->input('exp_date'));
        $work->setContacts($this->htmlFilter($request->input('contacts')));
        $work->setDescription($this->htmlFilter($request->input('description')));
        $work->setPrice($this->htmlFilter($request->input('price')));
        $work->setAddress($this->htmlFilter($request->input('address')));
        if (!($request->input('time_to_work'))){
            $work->time_to_work = __('work.default_value_time_to_work');
        } else{
            $work->time_to_work = $request->input('time_to_work');
        }
        $work->save();
        return $work->categories()->attach($work->subcategory_id);

    }

    public function destroy( $work_id)
    {
        $work =  Work::find($work_id);
        $work->categories()->detach();
        return $work->delete();
    }

    public function validateWork(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|min:3',
            'user_id' => 'required|numeric',
            'exp_date' => 'required|date',
            'description' => 'required|string|max:2000|min:10',
            'price' => 'string',
            'address' => 'required|string',
            'subcategory_id.*' => 'exists:categories,id',
        ],[], [
            'subcategory_id.*' => 'категория',
            'price'=>'Баа'
        ]);
    }
    protected function htmlFilter(string $html)
    {
        return strip_tags($html, '<b><h1><small><p><em><span><strong><code><h2><h3><h4><h5><h6><del><i><s><hr><table><tr><td>');
    }
}
