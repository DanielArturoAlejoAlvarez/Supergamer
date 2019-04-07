<?php

namespace SuperGamer;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    protected $fillable=[
        'user_id', 'category_id', 'title', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
