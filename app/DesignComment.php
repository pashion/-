<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\CommentReply;
//评论表
class DesignComment extends Model
{
    protected $table = 'design_comment';
    protected $fillable = ['did', 'uid', 'tempuser', 'comtent'];

    public function deComments()
    {
        return $this->hasMany('App\CommnetReply', 'designcomment_id');
    }
 }
