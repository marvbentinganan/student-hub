<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'user_type', 'user_group', 'email', 'password', 'default_password', 'eula', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'default_password', 'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function account_setting()
    {
        return $this->hasOne(AccountSetting::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class)->latest();
    }
}
