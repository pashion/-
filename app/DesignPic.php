<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignPic extends Model
{
    protected $table = 'design_pic';
    protected $fillable = [''];

    function designs ()
    {
        return $this->belongTo('App\DesignComment');
    }
}
