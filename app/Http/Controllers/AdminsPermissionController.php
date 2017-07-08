<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Role;
use App\Permission;
use App\Http\Requests;
use DB;

class AdminsPermissionController extends Controller
{
	//显示管理员管理
    public function getShowadmins()
    {
        
        Admin::findRole('admin@show');

    	$admins = Admin::all();
        
    	return view('zhuazi.admins.showadmins',compact('admins'));
    	
    }

    //显示角色
    public function getShowrole()
    {
        Admin::findRole('admin@show');

    	$roles = Role::all();
    	return view('zhuazi.admins.showrole',compact('roles'));
    	
    }

    //加载添加角色模板
    public function getAddrole()
    {
        Admin::findRole('admin@add');

    	$permissions = Permission::all();
    	// dd($permissions);
    	
    	return view('zhuazi.admins.addrole',compact('permissions'));
    }

    //添加角色处理
    public function postAddr(Request $req)
    {
        Admin::findRole('admin@add');

    	$role['name'] = $req->input('role_name');
    	$pname = $req->input('p_name');
    	$size = count($req->input('p_name'));
    	$p_name = '';
    	for ($i=0; $i < $size; $i++) { 
    		$p_name .= $pname[$i].',';
    	}
    	$role['p_name'] = trim($p_name,',');
    	if ( DB::table('roles')->insert($role) ) {

    		return redirect('admin/admins/showrole')->with('success','添加成功');
    	}else{
            echo "<script> alert('添加失败');history.go(-1);window.location.reload();</script>";
    	}

    }

    //加载添加管理员模板
    public function getAddadmin()
    {
        Admin::findRole('admin@add');

    	$roles = Role::all();
    	return view('zhuazi.admins.addadmin',compact('roles'));
    }

    //添加管理员处理
    public function postAdda(Request $req)
    {

        Admin::findRole('admin@add');

    	//获取表单数据
    	$data = $req->except('_token');

    	//查询角色表数据
    	$role = DB::table('roles')->where('id','=',$req->input('role_id'))->get();
    	$data['role_name'] = $role[0]->name;
    	$data['addtime'] = date('Y-m-d');
    	if ( DB::table('admins')->insert($data) ) {

    		return redirect('admin/admins/showadmins')->with('success','添加成功');

    	}else{

            echo "<script> alert('添加失败');history.go(-1);window.location.reload();</script>";

    	}

    }

    //删除管理员操作
    public function getAdmindelete($id)
    {

        Admin::findRole('admin@delete');

        if ( DB::table('admins')->where('id','=',$id)->delete() ) {

            return redirect('admin/admins/showadmins')->with('success','删除成功');

        }else{

            echo "<script> alert('删除失败');history.go(-1);window.location.reload();</script>";
        }

    }

    //加载修改用户页面
    public function getAdminupdate($id)
    {
        Admin::findRole('admin@update');

        $roles = Role::all();
        $admins = DB::table('admins')->where('id','=',$id)->get();
        return view('zhuazi.admins.adminupdate',compact('roles','admins'));
    }

    //处理管理员修改操作
    public function postAdminupt(Request $req)
    {
        Admin::findRole('admin@update');

        $data = $req->except('_token','id');

        $role = DB::table('roles')->where('id','=',$req->input('role_id'))->get();
        $data['role_name'] = $role[0]->name;
        if ( DB::table('admins')->where('id','=', $req->input('role_id'))->update($data) ) {
            return redirect('admin/admins/showadmins')->with('success','修改成功');
        }else{
            echo "<script> alert('修改失败');history.go(-1);window.location.reload();</script>";
        }

    }

    //删除角色
    public function getDeleterole($id)
    {
        Admin::findRole('admin@delete');

        if ( DB::table('roles')->where('id','=',$id)->delete() ) {
            return redirect('admin/admins/showrole')->with('success','删除成功，请重新赋予所在角色管理员的角色');
        }else{
            echo "<script> alert('删除失败');history.go(-1);window.location.reload();</script>";
        }

    }

    //加载修改角色模板
    public function getUpdaterole($id)
    {
        Admin::findRole('admin@update');

        $roles = DB::table('roles')->where('id','=',$id)->get();
        $role_perm = explode(',',$roles[0]->p_name);
        $permissions = Permission::all();
        return view('zhuazi.admins.updaterole',compact('roles','permissions','role_perm'));
        
    }

    //执行修改角色权限操作
    public function postUpdater(Request $req)
    {
        Admin::findRole('admin@update');

        //获取角色名称
        $role['name'] = $req->input('role_name');
        //获取角色赋予的权限进行拼接处理
        $pname = $req->input('p_name');
        $size = count($req->input('p_name'));
        $p_name = '';
        for ($i=0; $i < $size; $i++) { 
            $p_name .= $pname[$i].',';
        }
        $role['p_name'] = trim($p_name,',');
        if ( DB::table('roles')->where('id','=',$req->input('id'))->update($role) ) {

            return redirect('admin/admins/showrole')->with('success','修改成功');
        }else{
            echo "<script> alert('修改失败');history.go(-1);window.location.reload();</script>";
        }

    }
}
