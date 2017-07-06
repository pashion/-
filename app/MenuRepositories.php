<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuRepositories
{
    public function Repositories()
    {
    	return 'abc';


    	$arr = [];
    	if(empty($menu))
		{
			return '';
		}
    	foreach($menu as $k=>$v)
    	{
    		if($v['tid'] == $tid)
    		{
    			$arr[$k] = $v;
    			$arr[$k]['child'] = self::getType($menu,$v['id']);
    		}
    	}
    	return $arr;
    }
}


