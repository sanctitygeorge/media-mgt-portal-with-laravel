@extends('layouts.app')

@section('content')

<div class="container">

            <h3 align="center">View Memeber Profile</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-4">
            <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('teams.index') }}" class="btn btn-default">Go Back</a>
        </div>
        <div class="col-md-4">
            <img class=" img-rounded img-fluid" src="{{ asset($team->image) }}" alt="team image" width="80%">
        </div>

         <div class="col-md-4">
            <small>Created: {{ $team->created_at->diffForHumans() }}</small>
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
           Full Name
        </div>
        <div class="card-body">
          <h3>{{$team->name}}</h3>  
        </div>
    </div>
            
        </div>

        <div class="col-md-2">
            <div class="card">
        <div class="card-header">
           Phone No.
        </div>
        <div class="card-body">
          <h3>{{$team->phone}}</h3>  
        </div>
    </div>
</div>

    <div class="col-md-6">
            <div class="card">
        <div class="card-header">
           Short Biography 
        </div>
        <div class="card-body">
          <div>
        {!! $team->biography !!}
        </div>  
        </div>
    </div>
</div>

        <!-- <div class="col-md-4">
            <div class="card">
        <div class="card-header">
           Image
        </div>
        <div class="card-body">
          <img class="img-fluid" src="{{ asset($team->image) }}" alt="team image" width="80%">
        </div>
    </div>
            
        </div> -->
        
    </div>

    <hr>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-2">

    {!! Html::linkRoute('teams.edit', 'Edit', array($team->id), array('class'=>'btn btn-primary btn-block')) !!}

    </div>
    
    <div class="col-md-2">

        {!! Form::open(['route' => ['teams.destroy', $team->id], 'method' => 'DELETE']) !!}
    
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
    
            {!! Form::close() !!}

    </div>
    </div>
</div>  
@endsection
