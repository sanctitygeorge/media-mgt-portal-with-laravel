@extends('layouts.app')
@section('title', '| View Post')
@section('content')

<div class="container">

            <h3 align="center">Edit Member</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
          <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('teams.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <!-- <div class="col-md-4">
            <h5>Featured : {{$teams->featured}} 
        </div> -->

         <div class="col-md-4">
            <small>Created: {{ $teams->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
        </div>
    </div>
</div>

<br>

{!! Form::model($teams, ['route' => ['teams.update', $teams->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}

    <div class="container" style="background-color: #fff;">

    <div class="jumbotron">
    <div class="col-md-10">
        {{ Form::open() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ Form::label('name', 'Full Name') }}
            {{ Form::text('name', $teams->name, ['class' => 'form-control', 'placeholder' => 'Full Name']) }}

            @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        </div>

         <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ Form::label('phone', 'Phone No.') }}
            {{ Form::text('phone', $teams->phone, ['class' => 'form-control', 'placeholder' => 'Phone No']) }}

            @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        </div>

        <div class="form-group{{ $errors->has('biography') ? ' has-error' : '' }}">
            {{ Form::label('biography', 'Short Biography') }}
            {{ Form::textarea('biography', $teams->biography, ['class' => 'form-control my-editor', 'placeholder' => 'Short Biography']) }}

            @if ($errors->has('biography'))
            <span class="help-block">
                <strong>{{ $errors->first('biography') }}</strong>
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

    
    </div>
    <br>
    <div class="row">
    <div class="col-sm-3">
    
        {!! Html::linkRoute('teams.index', 'Cancel', array($teams->id), array('class'=>'btn btn-danger btn-block')) !!}
    
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