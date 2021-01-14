<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $connection = 'db_test';
    protected $table = 'tb_users';
    public $timestamps = false;
}
