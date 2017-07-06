<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Permission;
use DB;

class RolesController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('role:admin');
	// }

    public function getIndex()
    {	

     //    $roles = new App\Role;
     //    $roles->

     //    dd($roles);
     //    $perms = Permission::table('permissions')->get();
    	// return view('auth.roles.index',compact('roles','perms'));
    }

    public function getAdd()
    {	
    	$roles = Role::with('perms')->get();
    	$perms = Permission::get();
    	return view('auth.roles._createForm',compact('perms'));
    }

    public function postStore(Request $request)
    {
    	$role = Role::create([
    			'name'=>$request->name,
    			'label'=>$request->label,
    			'description'=>$request->description

    		]);

    	if ($request->perm) {
    		$role->attachPermissions($request->perm);
    	}
    	return redirect('admin/roles/index');
    }

    public function getCreate()
    {

    	return view('auth.roles._createPower');
    }

    //修改角色权限
    public function postUpdate(Request $request)
    {
        $role = Role::findOrFail($request->id);
        //fill类似于create 但是不会更改ID
        $role->fill([
            'name'=>$request->name,
            'label'=>$request->label,
            'description'=>$request->description
            ])->save();
        $role->savePermissions($request->perm);
        return redirect()->back();
    }
     
    //删除角色
    public function postDelete(Request $request)
    {
        
        Role::whereId($request->id)->delete();
        dd(Role::whereId($request->id));
        // $role = Role::findOrFail($request->id);
        // dd($role);
        $role->users()->sync([]); // 删除关联数据
        $role->perms()->sync([]); // 删除关联数据
        $role->forceDelete(); // 不管透视表是否有级联删除都会生效
        return redirect()->back();
    }
}
				