<?php

namespace Danny;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable=[
        'name',
        'description',
        'user_id',
        'company_id',
        'days'
    ];

    // public function user(){
    //     return $this->belongsToMany("App\User");
    // }
    public function company(){
        return $this->belongsTo("Danny\Company");
    }

    public function comments(){
        return $this->morphMany("Danny\Comment","commentable");
    }
    public function users(){
        return $this->belongsToMany("Danny\User");
    }
}
