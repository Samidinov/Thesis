<?php


namespace App\Http\Service;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public function getUser($id)
    {
        return User::find($id);
    }

    public function show($id)
    {
        return $this->getUser($id);
    }
    public function update(Request $request ,$id)
    {
        $this->validateUser($request);
        $user = $this->getUser($id);
        $this->save($request,$user);
        return $user;
    }

    public function destroy($id)
    {
        return $this->getUser($id)->delete();
    }
    protected function save(Request $request,User $user){
        $user->name = $this->htmlFilter($request->input('name'));
        $user->surname = $this->htmlFilter($request->input('surname'));
        $user->phone_number = $this->htmlFilter($request->input('phone_number'));
        $user->email = $this->htmlFilter($request->input('email'));
        return $user->save();
    }
    protected function htmlFilter(string $html){
        return strip_tags($html,'<b><h1><small><p><em><span><strong><code><h2><h3><h4><h5><h6><del><i><s><hr><table><tr><td>');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateUser(Request $request)
    {
        $request->validate(
            [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'min:5', 'max:999999999999999','numeric'],
            'surname' => ['string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255'],
            'password' => ['string', 'min:8'],
            ]
        );
    }

}
