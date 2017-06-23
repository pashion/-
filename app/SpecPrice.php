<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecPrice extends Model
{
    protected $table = 'spec_price';
    protected $fillable = ['store', 'gid', 'str_bunch', 'bunch_name', 'price'];
}
