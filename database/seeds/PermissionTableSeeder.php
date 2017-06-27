<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\User;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	//清空权限相关数据
        Permission::truncate();
        Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        //创建初始的管理员用户
        $pilishen = User::create([
        	'name'=>'pilishen',
        	'email'=>'554018450@qq.com',
        	'password'=>bcrypt('123123')
        	])->attachRole($admin);;

        //创建初始的role
        $admin = Role::create([
        		'name'=>'admin',
        		'display_name'=>'管理员',
        		'description'=>'super admin role',
        	]);

        //创建相应的初始权限
        $pilishen->attachRole($admin);

        //给角色赋予相应的权限
        $permissions = [
        		[
        			'name' => 'create_user',
        			'display_name'=>'创建用户',
        		],
        		[
        			'name' => 'edit_user',
        			'display_name'=>'编辑用户',
        		],
        		[
        			'name' => 'delete_user',
        			'display_name'=>'删除用户',
        		],[
                    'name' => 'delete_role',
                    'display_name'=>'删除角色',
                ],[
                    'name' => 'edit_role',
                    'display_name'=>'编辑用户',
                ]

        ];
        
        foreach ($permissions as $permission)
        {
        	$manage_user = Permission::create($permission);
        	$admin->attachPermission($manage_user);

        }
      
    }
}
