<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    public function index() {
        return view('admin.permissions.index' , [
            'permissions' => Permission::all(),
        ]);
    }
    
    public function permission() {

        request()->validate([
            'name' => ['required'], 
        ]);

        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);
            return back();
    }

    public function edit(Permission $permission) {
        return view('admin.permissions.edit',[
            'permissions' => $permission,
        ]);
    }

    public function update(Permission $permission) {
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($permission->isDirty('name')) {
            session()->flash('permission-update' , 'Permission has been updated');
            $permission->save();
        } else {
            session()->flash('permission-update' , 'Nothing has been updated');
        }
        return back();
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        //session()->flash('role-delete',$permission->name.' role has been deleted');
        return back();
    }
}
