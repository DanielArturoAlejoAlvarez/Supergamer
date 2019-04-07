<?php

namespace SuperGamer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SuperGamer\Http\Requests\TagStoreRequest;
use SuperGamer\Http\Requests\TagUpdateRequest;
use SuperGamer\Http\Controllers\Controller;

use SuperGamer\Tag;

class TagController extends Controller{

    function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $tags=Tag::orderBy('id','DESC')->paginate(3);
        return view('admin.tags.index', compact('tags'));
    }

    public function create(){
        return view('admin.tags.create');
    }

    public function store(TagStoreRequest $request){
        $tag=Tag::create($request->all());
        return redirect()->route('tags.edit', $tag->id)->with('info','Tag saved successfully!');
    }

    public function show($id){
        $tag=Tag::findOrFail($id);
        return view('admin.tags.show', compact('tag'));
    }

    public function edit($id){
        $tag=Tag::findOrFail($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(TagUpdateRequest $request, $id){
        $tag=Tag::findOrFail($id);
        $tag->fill($request->all)->save();
        return redirect()->route('tags.edit', $tag->id)->with('info','Tag saved successfully!');
    }

    public function destroy($id){
        Tag::findOrFail($id)->delete();
        return back()->with('info', 'Tag deleted successfully!');
    }
}
