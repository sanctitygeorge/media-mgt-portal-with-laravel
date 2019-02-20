@extends('layouts.app')

@section('content')

<div class="container">

            <h3 align="center">View Post</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
            <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('posts.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <h5>Featured : {{$post->featured}} 
        </div>

         <div class="col-md-4">
            <small>Created: {{ $post->created_at->diffForHumans() }}</small>
        </div>

    </div>
    
        </div>
    </div>
</div>

<br>


<div class="container" style="background-color: #fff;">
    <br>
    <div class="row">
        <div class="col-md-2">
            <div class="card">
        <div class="card-header">
           Post Title
        </div>
        <div class="card-body">
          <h3>{{$post->title}}</h3>  
        </div>
    </div>
            
        </div>

        <div class="col-md-2">
            <div class="card">
        <div class="card-header">
           Slug 
        </div>
        <div class="card-body">
          <h3>{{$post->slug}}</h3>  
        </div>
    </div>
</div>

    <div class="col-md-4">
            <div class="card">
        <div class="card-header">
           Body 
        </div>
        <div class="card-body">
          <div>
        {!! $post->body !!}
        </div>  
        </div>
    </div>
</div>

        <div class="col-md-4">
            <div class="card">
        <div class="card-header">
           Image
        </div>
        <div class="card-body">
          <img class="img-fluid" src="{{ asset($post->image) }}" alt="post image" width="80%">
        </div>
    </div>
            
        </div>
        
    </div>

    <hr>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-2">

    {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class'=>'btn btn-primary btn-block')) !!}

    </div>
    
    <div class="col-md-2">

        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
    
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
    
            {!! Form::close() !!}

    </div>
    </div>
</div>  
@endsection
