<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaiin extends Model
{
    protected $table = 'kaiin';
    protected $guarded = array('kid');
    protected $primaryKey = 'kid';
    public $timestamps = false;
}