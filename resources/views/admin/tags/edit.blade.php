@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel pane-default">
                    <div class="panel-heading">
                        <h1 class="text-center be-gamer">EDIT TAG</h1>
                    </div>
                    <div class="panel-body">
                        {!! Form::model($tag, ['route' =>  ['tags.update', $tag->id], 'method'  =>  'PUT']) !!}
                           @include('admin.tags.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection