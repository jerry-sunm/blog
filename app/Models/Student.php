<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $connection = 'db_test';
    protected $table = 'tb_students';
    public $timestamps = false;
}
