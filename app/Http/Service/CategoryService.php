<?php


namespace App\Http\Service;


use Illuminate\Http\Request;
use App\Models\Category;

class CategoryService
{

    public function getAll()
    {
        return Category::all();
    }

    public function getCategories()
    {
        return Category::where('parent_id', 0)->get();
    }

    public function getSubcategories()
    {

    }


    public function findCategory($id)
    {
        return Category::find($id);
    }

    public function findSubcategories($parent_id)
    {
//        return Category::select('id','title','slug','parent_id')->where('parent_id','=',$parent_id);
        return Category::where('parent_id', $parent_id)->get();
    }

    public function store(Request $request)
    {

        $category = new Category();
        $category->title = $request->input('title');
        $category->slug = $request->input('slug');
        if (!$request->input('parent_id')) {
            $category->parent_id = 0;
        } else {
            $category->parent_id = $request->input('parent_id');
        }
        return $category->save();
    }


    public function update(Request $request, $id)
    {
        $category = $this->findCategory($id);
        $this->validateCategory($request);
        $category->title = $this->htmlFilter($request->input('title'));
        $category->slug = $this->htmlFilter($request->input('slug'));
        if ($request->input('parent_id')) {
            $category->parent_id = $this->htmlFilter($request->input('parent_id'));
        } else {
            $category->parent_id = 0;
        }
        return $category->save();
    }

    public function show($id)
    {

    }

    public function destroy($id)
    {
        $category = $this->findCategory($id);
        if ($category->parent_id === 0) {
            $subcategories = $this->findSubcategories($category->id);
            foreach ($subcategories as $subcategory){
                $subcategory->parent_id = 1;
                $subcategory->save();
            }
            return $category->delete();
        } else {
            return $this->findCategory($id)->delete();
        }
    }

    protected function htmlFilter(string $html)
    {
        return strip_tags($html, '<b><h1><small><p><em><span><strong><code><h2><h3><h4><h5><h6><del><i><s><hr><table><tr><td>');
    }

    protected function validateCategory(Request $request)
    {
        $request->validate(
            [
                'title' => ['required', 'string', 'max:255'],
                'slug' => ['required','string'],
                'parent_id' => ['numeric'],
            ]
        );
    }
}
