<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Permission;

class PermissionsController extends Controller
{
    public function postStore(Request $request)
    {
    	$perm = Permission::create([
    			'name'=>$request->name,
    			'display_name'=>$request->display_name,
    			'description'=>$request->description
    		]);

    	return redirect('admin/roles/index');
    }
}
