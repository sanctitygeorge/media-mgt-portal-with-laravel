@extends('layouts.app')

@section('content')

<div class="container">

            <h3 align="center">View Audio</h3> 
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


<div class="container" style="background-color: #fff;">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
        <div class="card-header">
          <h5 align="center"> Audio Title</h5>
        </div>
        <div class="card-body">
          <h3>{{$audio->title}}</h3>  
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
        {!! $audio->body !!}
        </div>  
        </div>
    </div>
</div>


    <hr>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-2">

    {!! Html::linkRoute('audios.edit', 'Edit', array($audio->id), array('class'=>'btn btn-primary btn-block')) !!}

    </div>
    
    <div class="col-md-2">

        {!! Form::open(['route' => ['audios.destroy', $audio->id], 'method' => 'DELETE']) !!}
    
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
    
            {!! Form::close() !!}

    </div>
    </div>
</div>  
@endsection
