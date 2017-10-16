<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalSetting extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = ['posts_enabled', 'comments_enabled', 'post_moderation', 'user_access'];
}
