<?php

namespace SuperGamer;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $fillable=[
        'name', 'slug', 'body'
    ];    

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
