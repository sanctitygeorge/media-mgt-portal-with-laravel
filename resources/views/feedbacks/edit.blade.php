@extends('layouts.app')
@section('content')



<div class="container">

             
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
          <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('feedbacks.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <h3 align="center">Edit Feedback</h3>
        </div>

         <div class="col-md-4">
            <small>Created: {{ $feedback->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
        </div>
    </div>
</div>

<br>

{!! Form::model($feedback, ['route' => ['feedbacks.update', $feedback->id], 'method' => 'PUT']) !!}

    <div class="container" style="background-color: #fff;">

    <div class="jumbotron">
    <div class="col-md-10">
        {{ Form::open() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', $feedback->name, array('class'=>'form-control')) }}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
        {{ Form::label('subject', 'Other Names:') }}
        {{ Form::text('subject', $feedback->subject, array('class'=>'form-control')) }}

        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>
                            
    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
        {{ Form::label('message', 'Message') }}
            {{ Form::textarea('message', $feedback->message, ['class' => 'form-control my-editor', 'placeholder' => 'Message']) }}

        @if ($errors->has('message'))
            <span class="help-block">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @endif
    </div>
                            
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        {{ Form::label('email', 'Email Address:') }}
        {{ Form::text('email', $feedback->email, array('class'=>'form-control')) }}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
                            
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        {{ Form::label('phone', 'Phone Number:') }}
        {{ Form::text('phone', $feedback->phone, array('class'=>'form-control')) }}

        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>


    </div>
    <br>
    <div class="row">
    <div class="col-sm-3">
    
        {!! Html::linkRoute('feedbacks.index', 'Cancel', array($feedback->id), array('class'=>'btn btn-danger btn-block')) !!}
    
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