@extends('layouts.app')

@section('content')
<div class="container" style="background-color: #fff;">
	<div class="row">
		<div class="col-md-10">
    <h1 align="center">
    <a href="{{ route('teams.index') }}" class="btn btn-default"><h5>Go Back</h5></a>Add New Member</h1>
    <hr>
    {!! Form::open(['route' => 'teams.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::label('name', 'Full Name') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Full Name']) }}
        </div>

        <div class="form-group">
            {{ Form::label('phone', 'Phone No.') }}
            {{ Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone No.']) }}
        </div>

        <div class="form-group">
            {{ Form::label('biography', 'Short Biography')}}
            {{ Form::textarea('biography', '', ['class' => 'form-control my-editor', 'placeholder' => ' Short Biography']) }}
        </div>

        <div class="form-group">
                {{ Form::file('image')}}               
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