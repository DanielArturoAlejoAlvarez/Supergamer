<?php

namespace SuperGamer\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SuperGamer\Http\Requests\CategoryStoreRequest;
use SuperGamer\Http\Requests\CategoryUpdateRequest;
use SuperGamer\Http\Controllers\Controller;

use SuperGamer\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id','DESC')->paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request){
        $category=Category::create($request->all());
        return redirect()->route('categories.edit', $category->id)->with('info', 'Category saved successfully!');
    }

    public function show($id){
        $category=Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function edit($id){
        $category=Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request,$id){
        $category=Category::findOrFail($id);
        $category->fill($request->all())->save();
        return redirect()->route('categories.edit', $category->id)->with('info', 'Category updated successfully!');

    }

    public function destroy($id){
        Category::findOrFail($id)->delete();
        return back()->with('info', 'Category deleted successfully!');
    }
}
