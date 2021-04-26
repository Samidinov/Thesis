<?php


namespace App\Http\Service;


use App\Models\Master;
use App\Models\User;
use Illuminate\Http\Request;

class MasterService
{
    public function find($user_id)
    {
        return Master::find($user_id);
    }

    public function findUser($master_id)
    {
        return User::find($master_id);
    }

    public function store(Request $request)
    {
        $master = new Master();
        $master->setBirthYear($request->input('birth_year'));
        $master->setExperience($request->input('experience'));
        $master->setPhoto($request->input('photo'));
        $master->setId($request->input('user_id'));
        $master->save();
        return $master;
//        return $master->categories()->attach( $request->input('subcategory_id'));

    }

    public function update( Request $request, $master_id)
    {
        $master = Master::find($master_id);
        $this->change( $request, $master );
        $master->categories()->detach();
        return $master->categories()->attach( $request->input('subcategory_id'));
    }

    private function change( Request $request, Master $master){
        $master->setBirthYear($request->input('birth_year'));
        $master->setExperience($request->input('experience'));
        $master->setPhoto($request->input('photo'));
        $master->setId($request->input('user_id'));
        return $master->save();
    }
}
