<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainNavigation extends Model
{
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'link', 'icon', 'color', 'order'];

    public function roles(){
    	return $this->belongsToMany('App\Models\Role');
  	}
}
