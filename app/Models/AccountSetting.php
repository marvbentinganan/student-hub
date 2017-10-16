<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountSetting extends Model
{
    use SoftDeletes;

    protected $fillable = ['comments_enabled', 'default_visibility'];

    protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    
    public function visibility(){
    	return $this->hasOne(Visibility::class, 'id', 'default_visibility');
    }
}
