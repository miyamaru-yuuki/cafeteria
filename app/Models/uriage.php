<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uriage extends Model
{
    protected $table = 'uriage';
    protected $guarded = array('uid');
    protected $primaryKey = 'uid';
    public $timestamps = false;
}