<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignComment extends Model
{
    protected $table = 'design_comment';
    protected $fillable = ['did', 'uid', 'tempuser', 'comtent'];
 }
