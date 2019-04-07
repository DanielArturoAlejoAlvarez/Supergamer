<div class="form-group">
    {{ Form::label('name', 'NAME:') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'SLUG:') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::submit('SUBMIT', ['class' =>  'btn btn-md btn-primary btn-block']) }}
</div>

@section('scripts')
    <script src="{{asset('vendor/StringToSlug/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#name, #slug').stringToSlug({
                callback: function(text){
                    $('#slug').val(text)
                }
            })
        })
    </script>
@endsection