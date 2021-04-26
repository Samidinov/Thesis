<?php

namespace App\Http\Controllers;

use App\Http\Service\MasterService;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $UserService;
    private $masterService;
    public function __construct(UserService $UserService , MasterService  $masterService){
        $this->UserService = $UserService;
        $this->masterService = $masterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $user = $this->UserService->show($id);
        return view('user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->UserService->show($id);
        return view('user.edit',[
                                        'user'=>$user,
                                        'master' => $this->masterService->find($user->id),
                                                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->UserService->update($request,$id);
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->UserService->destroy($id);
        return redirect(route('work.index'));
    }

    public function userAds (Request $request) {
        $input = $request->all();
        if ($input['action'] ==='add') {
            return $this->UserService->addToUsersSavedWorkAdList ($input['user_id'], $input['ad_id'], 'WORK');
        }
        elseif ($input['action'] === 'remove') {
            return $this->UserService->removeFromUsersSavedWorkAdList ($input['user_id'], $input['ad_id'], 'WORK');
        }
    }

    public function isMyAd(Request $request) {
        $input = $request->all();
        $result = $this->UserService->checkMapping($input['user_id'], $input['ad_id'], 'WORK');
        return ['result'=>$result];
    }


}
