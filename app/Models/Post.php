<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['content', 'user_id', 'user_type', 'org_id', 'visibility_id', 'comments_enabled', 'photo'];

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function visibility(){
    	return $this->hasOne(Visibility::Class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}