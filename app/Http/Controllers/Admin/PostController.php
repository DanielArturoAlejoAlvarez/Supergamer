<?php

namespace SuperGamer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SuperGamer\Http\Requests\PostStoreRequest;
use SuperGamer\Http\Requests\PostUpdateRequest;
use SuperGamer\Http\Controllers\Controller;

use SuperGamer\Post;
use SuperGamer\Category;
use SuperGamer\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'ASC')->where('user_id', auth()->user()->id)->paginate(3);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        $tags=Tag::orderBy('name','ASC')->get();
        $categories=Category::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request){
        $post=Post::create($request->all());

        //IMAGE
        if($request->file('file')){
            $path=Storage::disk('public')->put('img/posts', $request->file('file'));
            $post->fill(['file' =>  asset($path)])->save();            
        }

        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)->with('info', 'Post saved successfully!');
    }

    public function show($id){
        $post=Post::findOrFail($id);
        $this->authorize('securePass', $post);
        return view('admin.posts.show', compact('post'));
    }

    public function edit($id){
        $post=Post::findOrFail($id);
        $this->authorize('securePass', $post);
        $tags=Tag::orderBy('name','ASC')->get();
        $categories=Category::orderBy('name', 'ASC')->pluck('name', 'id');        
        return view('admin.posts.edit', compact('post', 'categories','tags'));
    }

    public function update(PostUpdateRequest $request,$id){
        $post=Post::findOrFail($id);
        $this->authorize('securePass', $post);
        $post->fill($request->all())->save();

        //IMAGE
        if($request->file('file')){
            $path=Storage::disk('public')->put('img/posts', $request->file('file'));
            $post->fill(['file' =>  asset($path)])->save();            
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));
        return redirect()->route('posts.edit', $post->id)->with('info', 'Post updated successfully!');
    }

    public function destroy($id){
        $post=Post::findOrFail($id);
        $this->authorize('securePass', $post);
        $post->delete();
        return back()->with('info', 'Post deleted successfully!');
    }
}
