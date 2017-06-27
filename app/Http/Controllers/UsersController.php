<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;

class UsersController extends Controller
{
    public function getIndex()
    {
    	$users = User::with('roles.perms')->where('name', '=','pilishen')->get();
    	$role = Role::with('perms')->get();
    	return view('auth.users.showusers',compact('users'));
    }
}
