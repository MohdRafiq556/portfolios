<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Image;
use Storage;

use Illuminate\Support\Str;

use App\Http\Controllers\ProjectCategoriesController;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index() {
        $projects = auth()->user()->projects()->latest()->paginate(10);
        
        return view('admin.projects.index', ['projects'=> $projects]);
    }

    public function show(Project $project, ProjectImage $project_images) {
        $project_images = ProjectImage::where('project_id',$project->id)->get();
        return view('project-post', ['project'=> $project, 'project_images' => $project_images ]);
    }

    public function user_show(Project $project, ProjectImage $project_images) {
        $project_images = ProjectImage::where('project_id',$project->id)->get();
        return view('project-post', ['project'=> $project, 'project_images' => $project_images ]);
    }

    public function create() {
        $this->authorize('create', Project::class);
        $project_categories = ProjectCategory::all();
        return view('admin.projects.create', ['project_categories'=> $project_categories]);
    }

    public function store() {
        $this->authorize('create', Project::class);

        //////////image accessor ////////
        // if(request('images')) {
        //     $inputs['images'] = request('images')->store('uploads');
        // } 
        //////////image accessor ////////

        //////////////////////////// save inputs /////////////////
        // auth()->user()->projects()->create($inputs);
        // session()->flash('project-created-message', 'Project: ' . $inputs['title']. ' Has Been Created.');
        // return redirect()->route('project.index');
        //////////////////////////// save inputs /////////////////

        //////////laravel erwin////////
        // if($file_1 = request()->file('project_image_id')) {
        //     $name = time() . $file_1->getClientOriginalName();

        //     $file_1->move('uploads', $name);
        //     $project_image = ProjectImage::create(['file_1'=>$name, 'file_2'=>$name, 'file_3'=>$name, 'file_4'=>$name, 'file_5'=>$name]);
        //     $inputs['project_image_id'] = $project_image->id;
        // }
        //////////laravel erwin////////

        //////////image google//////////
        $inputs = request()->validate([
            'title'=> 'required|unique:projects',
            'author'=> 'required',
            'links'=> 'required',
            'project_category_id'=> 'required',
            'details'=> '',
            'intro'=> 'required',
            'thumbnail' => 'required',
            'feature' => 'required' ,
            'framework' => 'required' ,
            'language' => 'required' ,
            'styling' => '' ,
            'others' => '' ,
            //'project_image'=> 'required',
        ]);

        //auth()->user()->projects()->create($inputs);

        //////// WORKING CODING ////////
        // foreach(request()->file('project_image') as $img) {
        //     $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        //     Image::make($img)->resize(300,300)->save('uploads/project_img/'.$make_name);
        //     $uploadPath = 'uploads/project_img/'.$make_name;
        // }
        // auth()->user()->projects()->create($inputs)->images()->create(['project_id' => $inputs, 'image_name' => $uploadPath,]);

        // session()->flash('project-created-message', 'Project: ' . $inputs['title']. ' Has Been Created.');
        // return redirect()->route('project.index');
        //////// WORKING CODING ////////
        //////////image google//////////

        //********************************IMAGE THUMBNAIL ********************* */
            $thumb = request()->file('thumbnail');
            $name_gen = hexdec(uniqid()).'.'.$thumb->getClientOriginalExtension();
            Image::make($thumb)->resize(1280,720)->save('uploads/project_img/project_thumbnail/'.$name_gen);
            $save_thumb = 'uploads/project_img/project_thumbnail/'.$name_gen;
            
            $inputs['thumbnail'] = $save_thumb;
        //********************************IMAGE THUMBNAIL ********************* */
            
            foreach(request()->file('1st_image') as $fir_img) {
                $make_name = hexdec(uniqid()).'.'.$fir_img->getClientOriginalExtension();
                Image::make($fir_img)->resize(1280,720)->save('uploads/project_img/'.$make_name);
                $uploadFirstPath = 'uploads/project_img/'.$make_name;
            }

            foreach(request()->file('2nd_image') as $sec_img) {
                $createSec_name = hexdec(uniqid()).'.'.$sec_img->getClientOriginalExtension();
                Image::make($sec_img)->resize(1280,720)->save('uploads/project_img/'.$createSec_name);
                $uploadSecPath = 'uploads/project_img/'.$createSec_name;
            }

            foreach(request()->file('3rd_image') as $third_img) {
                $createThird_name = hexdec(uniqid()).'.'.$third_img->getClientOriginalExtension();
                Image::make($third_img)->resize(1280,720)->save('uploads/project_img/'.$createThird_name);
                $uploadThirdPath = 'uploads/project_img/'.$createThird_name;
            }

            foreach(request()->file('4th_image') as $fourth_img) {
                $createFourth_name = hexdec(uniqid()).'.'.$fourth_img->getClientOriginalExtension();
                Image::make($fourth_img)->resize(1280,720)->save('uploads/project_img/'.$createFourth_name);
                $uploadFourthPath = 'uploads/project_img/'.$createFourth_name;
            }

        auth()->user()->projects()->create($inputs)->images()->create([
            'project_id' => $inputs, 
            'first_image' => $uploadFirstPath , 
            'second_image' => $uploadSecPath , 
            'third_image' => $uploadThirdPath , 
            'fourth_image' => $uploadFourthPath ,
        ]);
        session()->flash('project-created-message', 'Project: ' . $inputs['title']. ' Has Been Created.');
        return redirect()->route('project.index');
    }

    public function edit(Project $project, ProjectImage $project_images) {
        $this->authorize('view', $project);
        
        $project_categories = ProjectCategory::all();

        $project_images = ProjectImage::where('project_id',$project->id)->get();

        return view('admin.projects.edit', ['project'=>$project, 'project_categories'=> $project_categories, 'project_images'=> $project_images ]);
    }

    public function destroy(Project $project ,Request $request) {
        $this->authorize('delete', $project);
        $project->delete();
        $request->session()->flash('project-deleted-message', 'Project: ' . $project['title']. ' Has Been Deleted.');
        return back();
    }

    public function update(Project $project, ProjectImage $project_image) {
        $inputs = request()->validate([
            'title'=> 'required',
            'author'=> 'required',
            'links'=> 'required',
            'project_category_id'=> 'required',
            'details'=> '',
            'intro'=> 'required',
            'thumbnail' => '',
            'feature' => 'required',
            'framework' => 'required',
            'language' => 'required',
            'styling' => '',
            'others' => '',
        ]);

        // ************************    IMAGE ACCESSOR    ********************* //
        // if(request('images')) {
        //     $inputs['images'] = request('images')->store('uploads');
        //     $project->images = $inputs['images'];
        // }
        // ************************    IMAGE ACCESSOR    ********************* //

        // ************************   UPLOAD ONE IMAGE   ********************* //
        // if($file_1 = request()->file('project_image_id')) {
        //     $name = time() . $file_1->getClientOriginalName();

        //     $file_1->move('uploads', $name);
        //     $project_image = ProjectImage::create(['file_1'=>$name, 'file_2'=>$name, 'file_3'=>$name, 'file_4'=>$name, 'file_5'=>$name]);
        //     $inputs['project_image_id'] = $project_image->id;
        // }
        // ************************   UPLOAD ONE IMAGE   ********************* //

        $project->title = $inputs['title'];
        $project->author = $inputs['author'];
        $project->links = $inputs['links'];
        $project->project_category_id = $inputs['project_category_id'];
        $project->details = $inputs['details'];
        $project->intro = $inputs['intro'];
        $project->slug = Str::slug($inputs['title'], '-');
        // $project->thumbnail = $inputs['thumbnail'];
        $project->feature = $inputs['feature'];
        $project->framework = $inputs['framework'];
        $project->language = $inputs['language'];
        $project->styling = $inputs['styling'];
        $project->others = $inputs['others'];

        $this->authorize('update', $project);

        if($newThumb = request()->file('thumbnail')) {
            //$newThumb = request()->file('thumbnail');
            $newName_gen = hexdec(uniqid()).'.'.$newThumb->getClientOriginalExtension();
            Image::make($newThumb)->resize(1280,720)->save('uploads/project_img/project_thumbnail/'.$newName_gen);
            $save_url = 'uploads/project_img/project_thumbnail/'.$newName_gen;
            
            $project->thumbnail = $save_url;
        
            $project->save();
        } else {

        if($newFirst_img = request()->file('1st_image')){

            foreach($newFirst_img as $first_image => $project_image) {
                // $imgDel = ProjectImage::findOrFail($project_image);
                // unlink($imgDel->$project_image->first_image);

                $make_name = hexdec(uniqid()).'.'.$project_image->getClientOriginalExtension();
                Image::make($project_image)->resize(1280,720)->save('uploads/project_img/'.$make_name);
                $uploadFirstPath = 'uploads/project_img/'.$make_name; 

                ProjectImage::where('first_image', $first_image)->update([
                    // 'project_id' => $inputs,
                    'first_image' => $uploadFirstPath,
                ]);
            } 
        }
        /// ***************** FIRST IMAGE  ****************************//

        if($newSec_img = request()->file('2nd_image')) {

            foreach($newSec_img as $second_image => $project_SecondImage) {

                $make_SecName = hexdec(uniqid()).'.'.$project_SecondImage->getClientOriginalExtension();
                Image::make($project_SecondImage)->resize(1280,720)->save('uploads/project_img/'.$make_SecName);
                $uploadSecondPath = 'uploads/project_img/'.$make_SecName; 

                ProjectImage::where('second_image', $second_image)->update([
                    // 'project_id' => $inputs,
                    'second_image' => $uploadSecondPath,
                ]);
            }
        }

        /// ***************** SECOND IMAGE  ****************************//

        if($newThird_img = request()->file('3rd_image')) {

            foreach($newThird_img as $third_image => $project_ThirdImage) {

                $make_ThirdName = hexdec(uniqid()).'.'.$project_ThirdImage->getClientOriginalExtension();
                Image::make($project_ThirdImage)->resize(1280,720)->save('uploads/project_img/'.$make_ThirdName);
                $uploadThirdPath = 'uploads/project_img/'.$make_ThirdName; 

                ProjectImage::where('third_image', $third_image)->update([
                    // 'project_id' => $inputs,
                    'third_image' => $uploadThirdPath,
                ]);
            }
        }

        /// ***************** THIRD IMAGE  ****************************//

        if($newFourth_img = request()->file('4th_image')) {

            foreach($newFourth_img as $fourth_image => $project_FourthImage) {

                $make_FourthName = hexdec(uniqid()).'.'.$project_FourthImage->getClientOriginalExtension();
                Image::make($project_FourthImage)->resize(1280,720)->save('uploads/project_img/'.$make_FourthName);
                $uploadFourthPath = 'uploads/project_img/'.$make_FourthName; 

                ProjectImage::where('fourth_image', $fourth_image)->update([
                    // 'project_id' => $inputs,
                    'fourth_image' => $uploadFourthPath,
                ]);
            }
        }
        /// ***************** FOURTH IMAGE  ****************************//
    }
        session()->flash('project-updated-message', 'Project: ' . $inputs['title']. ' Has Been Updated.');
        return redirect()->route('project.index');
    }
}
