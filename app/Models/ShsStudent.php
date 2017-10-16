<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShsStudent extends Model
{
    protected $connection = 'pgsql_shs';
    protected $table = 'mod_users';
    public $timestamps = false;

    protected $fillable = ['user_id', 'user_role', 'firstname', 'middlename', 'lastname', 'password'];
}
