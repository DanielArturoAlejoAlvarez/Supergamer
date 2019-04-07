@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="be-gamer">Awesome Posts</h1>                

                {{$posts->render()}}
                @foreach($posts as $post)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$post->title}}
                    </div>
                    <div class="panel-body">
                        @if($post->file)
                        <img src="{{$post->file}}" alt="{{$post->title}}" class="img-responsive picture">
                        @endif
                        <p>{{$post->excerpt}}</p>
                        <a href="{{route('post', $post->slug)}}" class="pull-right">detail <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                @endforeach
                {{$posts->render()}}
            </div>
        </div>
    </div>
@endsection