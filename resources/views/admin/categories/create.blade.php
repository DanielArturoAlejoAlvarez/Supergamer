@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel pane-default">
                    <div class="panel-heading">
                        <h1 class="text-center be-gamer">NEW CATEGORY</h1>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' =>  'categories.store']) !!}
                           @include('admin.categories.partials.form')
                        {!! Form::close() !!}
                    </div>
                </div>                
            </div>
        </div>
    </div>
@endsection