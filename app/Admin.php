<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Admin extends Model
{
    
	static function findRole($roles)
	{
		$role = Role::where( 'id',session('admins')[0]->role_id )->get();
		if ( count($role) == 1 ){
			$perm = explode(',', $role[0]->p_name); 
	        if ( !in_array($roles, $perm) ) {
	          
	          echo "<script> alert('你没有权限，请联系管理员');history.go(-1);window.location.reload();</script>";

	        }
		}else{
	          echo "<script> alert('你属于的角色已经不存在，请联系管理员');history.go(-1);window.location.reload();</script>";
		}
        
	}


}
