@extends('layouts.app')
@section('title', '| View Post')
@section('content')

<div class="container">

            <h3 align="center">Edit Post</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
          <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('posts.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <h5>Featured : {{$posts->featured}} 
        </div>

         <div class="col-md-4">
            <small>Created: {{ $posts->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
        </div>
    </div>
</div>

<br>

{!! Form::model($posts, ['route' => ['posts.update', $posts->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    <div class="container" style="background-color: #fff;">

    <div class="jumbotron">
    <div class="col-md-10">
        {{ Form::open() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', $posts->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}

            @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
        </div>

         <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug', $posts->slug, ['class' => 'form-control', 'placeholder' => 'Slug']) }}

            @if ($errors->has('slug'))
            <span class="help-block">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', $posts->body, ['class' => 'form-control my-editor', 'placeholder' => 'Body Text']) }}

            @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {{ Form::file('image')}}

            @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
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


    </div>
    <br>
    <div class="row">
    <div class="col-sm-3">
    
        {!! Html::linkRoute('posts.index', 'Cancel', array($posts->id), array('class'=>'btn btn-danger btn-block')) !!}
    
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