@extends('layouts.app')
@section('content')

<div class="container">

            <h3 align="center">Edit Audio</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
          <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('audios.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <h5>Featured : {{$audio->featured}} 
        </div>

         <div class="col-md-4">
            <small>Created: {{ $audio->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
        </div>
    </div>
</div>

<br>

{!! Form::model($audio, ['route' => ['audios.update', $audio->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    <div class="container" style="background-color: #fff;">

    <div class="jumbotron">
    <div class="col-md-10">
        {{ Form::open() }}


    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
     {{ Form::label('title', 'Title:') }}
     {{ Form::text('title',  $audio->title, array('class'=>'form-control')) }}

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
     </div>

    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
     {{ Form::label('body', ' Content')}}
            {{ Form::textarea('body', $audio->body, ['class' => 'form-control my-editor', 'placeholder' => ' Audio Youtube Link']) }}

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


    </div>
    <br>
    <div class="row">
    <div class="col-sm-3">
    
        {!! Html::linkRoute('audios.index', 'Cancel', array($audio->id), array('class'=>'btn btn-danger btn-block')) !!}
    
        </div>
        
        <div class="col-sm-3">
            {{ Form::submit('Update Changes', ['class'=>'btn btn-success btn-block']) }}
            
    
        </div>
        
    </div> 
    </div> 
    
    
    {!! Form::close() !!}
</div>
<!-- </div> -->


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