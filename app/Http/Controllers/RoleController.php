<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index() {
        return view('admin.roles.index' , ['roles' => Role::all()]);
    }

    public function store() {

        request()->validate([
            'name' => ['required'], 
        ]);

        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        return back();
    }

    public function destroy(Role $role) {
        $role->delete();
        session()->flash('role-delete',$role->name.' role has been deleted');
        return back();
    }

    public function edit(Role $role) {
        return view('admin.roles.edit',[
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Role $role) {
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($role->isDirty('name')) {
            session()->flash('role-update' , 'Role has been updated');
            $role->save();
        } else {
            session()->flash('role-update' , 'Nothing has been updated');
        }
        return back();
    }

    public function attach_permission(Role $role) {
        $role->permission()->attach(request('permission'));
        return back();
    }
    public function detach_permission(Role $role) {
        $role->permission()->detach(request('permission'));
        return back();
    }
}
