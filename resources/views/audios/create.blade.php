@extends('layouts.app')
@section('content')


<div class="container">


<br>
<div class="row">
<div class="col-md-10">
		<h3 align="center">
            <a href="{{ route('audios.index') }}" class="btn btn-default"><h5>Go Back</h5></a>Add New Audio </h3>
<hr>
    {!! Form::open(array('route' => 'audios.store')) !!}
 	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
     {{ Form::label('title', 'Title:') }}
     {{ Form::text('title', null, array('class'=>'form-control')) }}

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
     </div>

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
     {{ Form::label('body', ' Content')}}
            {{ Form::textarea('body', '', ['class' => 'form-control my-editor', 'placeholder' => 'Audio Youtube Link']) }}

        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
     </div>

<div class="col-md-2">
        {{ Form::label('featured', 'Featured:') }}
    <select name="featured" class="form-control">
            <option value = 0>No</option>
            <option value = 1>Yes</option>
    </select>
    </div>
<br>


 	{{ Form::submit('Add Audio', array('class'=>'btn btn-success btn-lg', 'style'=>'margin-top:20px;')) }}

 	
 	{!! Form::close() !!}
	 
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
