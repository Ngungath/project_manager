<?php

namespace Danny;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany("Danny\User");
    }
}
