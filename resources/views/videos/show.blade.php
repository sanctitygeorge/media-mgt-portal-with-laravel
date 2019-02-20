@extends('layouts.app')

@section('content')

<div class="container">

            <h3 align="center">View Video</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
            <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('videos.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <h5>Featured : {{$video->featured}} 
        </div>

         <div class="col-md-4">
            <small>Created: {{ $video->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
    
        </div>
    </div>
</div>

<br>


<div class="container" style="background-color: #fff;">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
        <div class="card-header">
          <h5 align="center"> Video Title</h5>
        </div>
        <div class="card-body">
          <h3>{{$video->title}}</h3>  
        </div>
    </div>
            
        </div>

        
    <div class="col-md-6">
            <div class="card">
        <div class="card-header">
           <h5 align="center">Content</h5> 
        </div>
        <div class="card-body">
          <div>
        {!! $video->body !!}
        </div>  
        </div>
    </div>
</div>


    <hr>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-2">

    {!! Html::linkRoute('videos.edit', 'Edit', array($video->id), array('class'=>'btn btn-primary btn-block')) !!}

    </div>
    
    <div class="col-md-2">

        {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'DELETE']) !!}
    
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
    
            {!! Form::close() !!}

    </div>
    </div>
</div>  
@endsection
