<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\User\Tag', 'post_tags');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\User\Category', 'category_posts');
    }
}
