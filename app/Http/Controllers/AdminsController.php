<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Image;
use Storage;

class AdminsController extends Controller
{
    public function index() 
    {
        return view('admin.index');
    }
}
