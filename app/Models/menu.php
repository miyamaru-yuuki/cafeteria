<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $guarded = array('mid');
    protected $primaryKey = 'mid';
    public $timestamps = false;
}