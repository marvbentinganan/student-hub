<?php

namespace App\Models;

use Laratrust\LaratrustRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends LaratrustRole
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    public function users(){
    	return $this->belongsToMany('App\Models\User');
  	}

  	public function permission(){
    	return $this->belongsToMany('App\Models\Permission');
  	}

    public function main_navigation(){
      return $this->belongsToMany('App\Models\MainNavigation');
    }
}
