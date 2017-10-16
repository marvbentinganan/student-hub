<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'firstname', 'middlename', 'lastname', 'gender', 'date_of_birth', 'picture'];

    protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function getFirstnameAttribute($value){
    	return ucwords($value);
    }

    public function getLastnameAttribute($value){
    	return ucwords($value);
    }

    public function getMiddlenameAttribute($value){
    	return ucwords($value);
    }
}
