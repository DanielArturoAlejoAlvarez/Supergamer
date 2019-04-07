@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel pane-default">
                    <div class="panel-heading">
                        <h1 class="text-center be-gamer">SHOW TAG</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>NAME:</strong> {{ $tag->name }}</p>
                        <hr>
                        <p><strong>SLUG:</strong> {{ $tag->slug }}</p>
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection


