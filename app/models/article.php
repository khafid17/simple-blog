<?php

namespace App\models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use SoftDeletes;
    protected $guarded  = ['id'];
    
}
