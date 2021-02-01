<?php

namespace App\Http\Controllers;

use App\Http\Service\CategoryService;
use App\Http\Service\MasterService;
use App\Http\Service\WorkService;
use App\Models\Category;
use App\Models\Master;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MasterController extends Controller
{
    protected $categoriesService;
    protected $masterService;
    public function __construct( CategoryService $categoryService, MasterService $masterService)
    {
        $this->categoriesService = $categoryService;
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
     * @return
     *
     */

    public function create($id)
    {
        return view('master.create', [
                                    'user_id' => $id,
                                    'categories' => $this->categoriesService->getAll(),
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->masterService->store($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show( $id)
    {
        $master = $this->masterService->find($id);
        if( $master){
            return  view('master.show' ,[
                    'master' => $master,
                    'user' => $this->masterService->findUser($id)],


            );
        } else{
            return  redirect(route('master.create',$id));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     *
     */
    public function edit(Master $master)
    {
        return view('master.edit', [
                                           'master'=> $master,
                                            'categories' => $this->categoriesService->getAll(),
                                            'checked_categories' => $master->categories,
                                            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $master_id)
    {
        $this->masterService->update( $request, $master_id );
        return  redirect(route('master.edit' ,['master' => Master::find($master_id)] ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        dd('destroy master'.$master);
    }
}
