@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="text-center be-gamer">CATEGORY</h1>
                
                <a href="{{route('categories.create')}}" class="btn btn-md btn-primary"><i class="fas fa-plus"></i></a>
                <table class="table table-bordered table-condensed table-striped table-hover">
                    
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>SLUG</th>
                                <th colspan="3">ACTIONS</th>
                            </tr>
                           
                        </thead>
                   
                        <tbody>
                            @foreach($categories as $cat)
                            <tr>
                                <th class="number">{{$cat->id}}</th>
                                <td>{{$cat->name}}</td>
                                <td>{{$cat->slug}}</td>
                                <td>
                                    <a href="{{route('categories.show', $cat->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('categories.edit', $cat->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>

                                    {!! Form::open(['route'  =>  ['categories.destroy', $cat->id], 'method'   =>  'DELETE']) !!}
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
                    {{$categories->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection