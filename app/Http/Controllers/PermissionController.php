<?php

namespace App\Http\Controllers;

use App\Models\Permission;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.permissions.index',[
            'permissions'=> Permission::all()
        ]);
    }

    public function store(Permission $permission) {
        request()->validate([
            'name'=>['required']
        ]);
        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
        session()->flash('permission-created', 'Permission: ' . request('name') . ' Has Been Created!');
        return back();
    }

    public function edit(Permission $permission) {
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission) {
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');

        if($permission->isDirty('name')) {
            session()->flash('permission-updated', 'Permission: ' . $permission->name . ' Has Been Updated!');
            $permission->save();
            return redirect()->route('permissions.index');
        } else {
            session()->flash('permission-updated', 'Nothing Updated!');
            return back();
        }
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        session()->flash('permission-deleted', 'Permission: ' . $permission->name . ' Has Been Deleted!');
        return back();
    }
}
