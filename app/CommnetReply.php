<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//评论回复表
class CommnetReply extends Model
{
    protected $table = 'comment_reply';
    protected $fillable = ['cid', 'uname', 'content','designcomment_id','design_id', 'repaly_targe'];

    function commRe ()
    {
        return $this->belongTo('App\DesignComment');
    }
}
