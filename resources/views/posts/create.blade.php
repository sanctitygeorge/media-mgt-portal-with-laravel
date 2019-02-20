@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #fff;">
	<div class="row">
		<div class="col-md-10">
    <h1 align="center">
    <a href="{{ route('posts.index') }}" class="btn btn-default"><h5>Go Back</h5></a>Create Post</h1>
    <hr>
    {!! Form::open(['route' => 'posts.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('title', 'Post Title') }}
            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Post Title']) }}
        </div>

        <div class="form-group">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Slug']) }}
        </div>

        <div class="form-group">
            {{ Form::label('body', 'Post Body')}}
            {{ Form::textarea('body', '', ['class' => 'form-control my-editor', 'placeholder' => ' Post Body Text']) }}
        </div>

        <div class="form-group">
                {{ Form::file('image')}}               
        </div>

        <div class="col-md-2">
        {{ Form::label('featured', 'Featured:') }}
    <select name="featured" class="form-control">
            <option value = 0>No</option>
            <option value = 1>Yes</option>
    </select>
    </div>
    <br>

    <h5 align="center">
        {{Form::submit('Create Post', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

</h5>
   
</div>
</div>
</div>

   <script>
              var editor_config = {
                path_absolute : "/",
                selector: "textarea.my-editor",
                plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table contextmenu directionality",
                  "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }

                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }
              };

              tinymce.init(editor_config);
            </script>

@endsection