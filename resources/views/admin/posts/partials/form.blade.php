{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('title', 'TITLE: ') }}
    {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'SLUG: ') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'EXCERPT: ') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>

<div class="form-group">
    {{ Form::label('body', 'BODY:') }}
    {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'CKEbody']) }}
</div>

<div class="form-group">
    {{ Form::label('category_id', 'CATEGORY: ') }}
    {!!Form::select('category_id', $categories, null, ['class' => 'form-control'])!!}
</div>

<div class="form-group">
    {{ Form::label('tags', 'TAGS: ') }}
    <div>
        @foreach($tags as $tag)
        <label>
            {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
        </label>
        @endforeach
    </div>
</div>

<div class="form-group">
    {{ Form::label('file', 'PICTURE: ') }}
    
    {{ Form::file('file') }}
</div>

<div class="form-group">
    {{ Form::label('status', 'STATUS: ') }}
    <div>
        <label>
            {{ Form::radio('status', 'PUBLISHED')}} PUBLISHED
        </label>
        <label>
            {{ Form::radio('status', 'DRAFT')}} DRAFT
        </label>
    </div>
    
</div>

<div class="form-group">
    {{ Form::submit('SUBMIT', ['class' =>  'btn btn-md btn-primary btn-block']) }}
</div>

@section('scripts')
    <script src="{{asset('vendor/StringToSlug/jquery.stringToSlug.min.js')}}"></script>
    <script src="{{asset('vendor/CKEditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#title, #slug').stringToSlug({
                callback: function(text){
                    $('#slug').val(text)
                }
            })
        })

        /*CKEDITOR.config.height=400
        CKEDITOR.config.width='auto' 

        CKEDITOR.replace('body')*/
        ClassicEditor
        .create( document.querySelector( '#CKEbody' ), {
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