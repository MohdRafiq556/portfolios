<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.roles.index', 
            ['roles'=> Role::all()]
        );
    }

    public function edit(Role $role) {
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=> Permission::all()
    ]);
    }

    public function store(Request $request) {
        request()->validate([
            'name'=> ['required']
        ]);

        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);
        session()->flash('role-created', 'Role: '. request('name') . ' Has Been Created!');
        return back();
    }

    public function update(Role $role) {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');

        if($role->isDirty('name')) {
            session()->flash('role-updated', 'Role: '. request('name') . ' Has Been Updated!');
            $role->save();
            return redirect()->route('roles.index');
        } else {
            session()->flash('role-updated', 'Nothing Updated!');
            return back();
        }
    }

    public function attach_permission(Role $role) {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach_permission(Role $role) {
        $role->permissions()->detach(request('permission'));
        return back();
    }

    public function destroy(Role $role) {
        $role->delete();
        session()->flash('role-deleted', 'Role: ' . $role->name . ' Has Been Deleted!');
        return back();
    }
}
