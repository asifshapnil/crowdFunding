<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cards()
    {
        return $this->hasMany('App\Models\UserCard', 'user_id');
    }
    public function profile()
    {
        return $this->hasOne('App\Models\Profile', 'user_id');
    }
    public function projects()
    {
        return $this->hasMany('App\Models\Project', 'user_id');
    }
    public function favourites()
    {
        return $this->hasMany('App\Models\FavouriteProject', 'user_id');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'user_id');
    }
    public function videoWatch()
    {
        return $this->hasMany('App\Models\VideoWatch', 'user_id');
    }
    public function message()
    {
        return $this->hasMany('App\Models\Message', 'user_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }
}
