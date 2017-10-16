<?php

namespace App\Models;

use Laratrust\LaratrustPermission;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends LaratrustPermission
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function roles(){
    	return $this->belongsToMany('App\Models\Role');
  	}
}
