@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
        
            <div class="col-md-10 col-md-offset-1">
                <h1 class="text-center be-gamer">CATEGORY</h1>
                
                <a href="{{route('posts.create')}}" class="btn btn-md btn-primary"><i class="fas fa-plus"></i></a>
                <table class="table table-bordered table-condensed table-striped table-hover">
                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>SLUG</th>
                                <th>USER</th>
                                <th>CATEGORY</th>
                                <th>TAGS</th>
                                <th colspan="3">ACTIONS</th>
                            </tr>
                           
                        </thead>
                   
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <th class="number">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    @foreach($post->tags as $tag)                                        
                                        <span class="label label-success">{{$tag->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>

                                    {!! Form::open(['route'  =>  ['posts.destroy', $post->id], 'method'   =>  'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    {!! Form::close() !!}
                                    
                                </td>
                            </tr>
                            @endforeach                           
                        </tbody>
                    </tr>
                </table>
                <hr>
                <div class="col-md-6 col-md-offset-3">
                    {{$posts->render()}}
                </div>
            </div>
            
        </div>
    </div>
@endsection