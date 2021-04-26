<?php

namespace App\Http\Controllers;

use App\Http\Service\CategoryService;
use App\Http\Service\UserService;
use App\Http\Service\WorkService;
use App\Models\Work;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    protected $workService;
    protected $userService;
    protected $categoryService;

    public function __construct(WorkService $workService, UserService $userService,CategoryService  $categoryService)
    {
        $this->workService = $workService;
        $this->userService = $userService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('work.index', ['works' => $this->workService->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {

        return view('work.create',
            [
                'categories' => $this->workService->getAllCategories(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->workService->store($request);
        return redirect(route('work.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Work $work
     * @return View
     */
    public function show(Work $work)
    {
        return view('work.show', [
                'work' => $work,
                'user' => $this->userService->getUser($work->user_id),
                'works' => $this->workService->getWorksByCategories($work),
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Work $work
     * @return View
     */
    public function edit(Work $work)
    {
        return view('work.edit', [
                                        'work' => $work,
                                        'categories' => $this->categoryService->getAll(),
                                        'checked_categories'=>$work->categories,
                                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Work $work
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $work_id)
    {
        $this->workService->update($request,$work_id);
        return  redirect(route('work.userWorks',$request->user_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Work $work
     * @return View
     */
    public function destroy(Work $work)
    {
        $user_id = $work->user_id;
        $this->workService->destroy($work->id);
        return redirect(route('work.userWorks',$user_id));
    }

    public function userWorks($user_id)
    {
        return view('work.show-users-works', ['works' => $this->workService->getWorksByUserId($user_id)]);
    }

}
