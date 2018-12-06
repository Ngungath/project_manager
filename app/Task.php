<?php

namespace Danny;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'company_id',
        'days',
        'hours'
    ];

    public function users(){
        return $this->belongsToMany("Danny\User");
    }
    public function projects(){
        return $this->belongsTo("Danny\Project");
    }
    public function companies(){
        return $this->belongsTo("Danny\Company");
    }
    public function user(){
        return $this->belongsTo("Danny\user");
    }

        public function comments(){
        return $this->morphMany("Danny/Comment","commentable");
    }

}
