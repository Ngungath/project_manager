<?php

namespace Danny;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'body',
        'url',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];

    public function commentable(){
    	return $this->morphTo();
    }

    // return user associated with this comments

    public function user()
    {
        return $this->hasOne("\Danny\User","id","user_id");
    }
}
