<?php

namespace App\Http\Controllers;

use App\Models\ProjectCategory;
use App\Models\Project;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class ProjectCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project_categories = auth()->User()->project_categories()->latest()->paginate(10);
        return view('admin.project-categories.index', ['project_categories'=> $project_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', ProjectCategory::class);
        return view('admin.project-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //$this->authorize('create', ProjectCategory::class);

        $inputs = request()->validate([
            'name'=>['required', 'unique:project_categories']
        ]);

        auth()->User()->project_categories()->create($inputs);
        session()->flash('project-category-created-message', 'Project Category: ' . $inputs['name']. ' Has Been Created.');
        return redirect()->route('project_categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCategory $project_category)
    {
        return view('admin.project-categories.edit', ['project_category'=>$project_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCategory $project_category)
    {
        $inputs = request()->validate([
            'name'=> ['required', 'unique:project_categories']
        ]);
        $project_category->name = $inputs['name'];

        $project_category->save();
        session()->flash('project-category-updated-message', 'Project Category: ' . $inputs['name']. ' Has Been Updated.');
        return redirect()->route('project_categories.index');

        //$this->authorize('update', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCategory $project_category ,Request $request)
    {
        $project_category->delete();
        $request->session()->flash('project-category-deleted-message', 'Project Category: ' . $project_category->name . ' Has Been Deleted.');
        return back();
    }
}
