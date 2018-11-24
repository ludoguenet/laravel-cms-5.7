<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\User\Post', 'post_tags');
    }
}
