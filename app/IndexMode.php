<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexMode extends Model
{
    protected $table = 'index_mode';
    protected $fillable = ['file_name', 'gid_bunch', 'modeName'];
}
