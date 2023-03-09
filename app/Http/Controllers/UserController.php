<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Image;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', ['users'=>$users]);
    }

    public function show(User $user) {
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=> Role::all(),
        ]);
    }

    public function update(User $user) {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
        ]);
        // if(request('avatar')) {
        //     $inputs['avatar'] = request('avatar')->store('uploads');
        // }  
        $avatar = request()->file('avatar');

        if(!$avatar) {
            $user->update($inputs);
        } else {
            // $name_gen = hexdec(uniqid());
            // $img_ext = strtolower($avatar->getClientOriginalExtension());
            // $img_name = $name_gen.'.'.$img_ext;
            // $up_location = 'uploads/avatar/';
            // $last_img = $up_location.$img_name;
            // $avatar->move($up_location,$img_name);

            $name_gen = hexdec(uniqid()).'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(260,240)->save('uploads/avatar/'.$name_gen);

            $last_img = 'uploads/avatar/'.$name_gen;
            $inputs['avatar'] = $last_img;

            $user->update($inputs);
        }
        
        session()->flash('profile-updated-message', 'Profile: ' . $inputs['name']. ' Has Been Updated.');
        return back();
    }

    public function attachRole(User $user) {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detachRole(User $user) {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user, Request $request) {

        $user->delete();
        session()->flash('user-deleted-message', 'User: ' . $user['name'] . ' Has Been Deleted.');
        return back();
    }

    

}
