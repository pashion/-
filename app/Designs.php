<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designs extends Model
{
    protected $table = 'designs';
    protected $fillable = [''];

    //关联方案图片
    public function PicArr ()
    {
        return $this->hasMany('App\DesignPic', 'did');
    }

    //关联方案文章
    public function TextArr ()
    {
        return $this->hasOne('App\DesignText', 'did');
    }

    //关联方案评论
    public function CommentArr ()
    {
        return $this->hasMany('App\DesignComment', 'did');
    }

}
