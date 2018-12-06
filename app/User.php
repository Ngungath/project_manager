<?php

namespace Danny;

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
        'first_name',
        //'middle_name',
        //'last_name', 
        'email', 
        'password',
       // 'role_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function task(){
        return $this->hasMany("Danny\Task");
    }

    // public function comments(){
    //     return $this->hasMany("App\Comment");
    // }

    public function role(){
        return $this->belongsTo("Danny\Role");
    }

    public function companies(){
        return $this->hasMany("Danny\Company");
    }

    public function tasks(){
        return $this->belongsToMany("Danny\Task");
    }

    public function projects(){
        return $this->belongsToMany("Danny\Project");
    }

        public function comments(){
        return $this->morphMany("Danny/Comment","commentable");
    }
}
