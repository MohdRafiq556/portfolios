<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use App\Models\ProjectImage;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Project $project, ProjectImage $project_images)
    {
        $projects = Project::latest()->get(); 
        $project_images = ProjectImage::where('project_id',$project->id)->get();
        
        return view('home', ['projects'=> $projects, 'project_images' => $project_images ]);
    }

   
}
