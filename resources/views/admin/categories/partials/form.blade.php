<div class="form-group">
    {{ Form::label('name', 'NAME:') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'SLUG:') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'BODY:') }}
    {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'CKEbody2']) }}
</div>

<div class="form-group">
    {{ Form::submit('SUBMIT', ['class' =>  'btn btn-md btn-primary btn-block']) }}
</div>

@section('scripts')
    <script src="{{asset('vendor/StringToSlug/jquery.stringToSlug.min.js')}}"></script>
    <script src="{{asset('vendor/CKEditor/ckeditor.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#name, #slug').stringToSlug({
                callback: function(text){
                    $('#slug').val(text)
                }
            })
        })

        ClassicEditor
        .create( document.querySelector( '#CKEbody2' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );
    </script>
@endsection