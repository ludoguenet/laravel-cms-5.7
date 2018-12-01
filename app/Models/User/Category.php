<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function posts()
    {
        return $this->belongsToMany('App\Models\User\Post', 'category_posts')->withTimestamps();
    }
}
