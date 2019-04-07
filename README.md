# SUPERGAMER
## Description

This Software of Application with PHP (BLOG).

## Installation
Using Laravel and MYSQL.


## Usage
```html
$ git clone https://github.com/DanielArturoAlejoAlvarez/Supergamer.git [NAME APP] 
$ npm install

$ php artisan serve
```
Follow the following steps and you're good to go! Important:


![alt text](https://tighten.co/assets/img/blog/tinker_dusk.gif)


## Coding

### CONTROLLERS

```php
...
public function category($slug){
    $category=Category::where('slug', $slug)->pluck('id')->first();
    $posts=Post::where('category_id',$category)->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3); 
    return view('web.posts', compact('posts'));   
}

public function tag($slug){       
    $posts=Post::whereHas('tags', function($query) use($slug){
        $query->where('slug', $slug);
    })->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);
    return view('web.posts', compact('posts'));
}
...
```

### MODELS

```php
...
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
...
```

### REQUESTS 

```php
...
public function rules()
    {
        return [
            'title'         =>      'required',
            'slug'          =>      'required|unique:posts,slug',
            'user_id'       =>      'required|integer',
            'category_id'   =>      'required|integer',
            'tags'          =>      'required|array',
            'body'          =>      'required',
            'status'        =>      'required|in:DRAFT,PUBLISHED',
        ];

        if($this->get('file'))
            $rules=array_merge($rules, ['file'  =>  'mimes:jpg,jpeg,png,gif']);

            return $rules;
    }
...
```

### VIEWS

```php
...
<div class="panel-body">
    @if($post->file)
    <img src="{{$post->file}}" alt="{{$post->title}}" class="img-responsive">
    @endif
    <p><strong><i>{{$post->excerpt}}</i></strong></p>
    <hr>
    
    <p class="lead">{!!$post->body!!}</p>
    <hr>
    <p><strong>Published: </strong>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</p>
    <p><strong>Author: </strong>{{$post->user->name}}</p>
    <hr>
    <strong>Tags: </strong>
    @foreach($post->tags as $tag)
    <a class="label label-success" href="{{route('tag', $tag->slug)}}"><i class="fas fa-hashtag"></i> {{$tag->name}}</a>
    @endforeach
    <a href="{{route('blog')}}" class="pull-right">Back</a>
</div>
...
```

### ROUTES 

```php
...
Route::get('blog', 'Web\PageController@blog')->name('blog');
Route::get('blog/{slug}', 'Web\PageController@post')->name('post');
Route::get('category/{slug}', 'Web\PageController@category')->name('category');
Route::get('tag/{slug}', 'Web\PageController@tag')->name('tag');
...
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/DanielArturoAlejoAlvarez/supergamer. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.


## License

The gem is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).



