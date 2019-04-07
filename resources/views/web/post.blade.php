@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <h1 class="be-gamer">{{$post->title}}</h1>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <strong>Category: </strong><a href="{{route('category', $post->category->slug)}}">{{$post->category->name}}</a> 
                    </div>
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
                </div>
               
            </div>
        </div>
    </div>
@endsection