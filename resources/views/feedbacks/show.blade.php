@extends('layouts.app')

@section('content')

<div class="container">

            <h3 align="center">View Feedback</h3> 
        <br>
    <div class="card">
        <div class="card-header">
            <div class="row">
        <div class="col-md-6">
            <a href="{{ route('home') }}">Dashboard &nbsp;</a>
            <a href="{{ route('feedbacks.index') }}" class="btn btn-default">Go Back</a>
        </div>

         <div class="col-md-6">
            <small>Time Received: {{ $feedback->created_at->diffForHumans() }}</small>
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
           Contact Name
        </div>
        <div class="card-body">
          <h5>{{$feedback->name}}</h5>  
        </div>
    </div>
            
        </div>

        <div class="col-md-3">
            <div class="card">
        <div class="card-header">
           Subject 
        </div>
        <div class="card-body">
          <h5>{{$feedback->subject}}</h5>  
        </div>
    </div>
</div>

    <div class="col-md-4">
            <div class="card">
        <div class="card-header">
           Message 
        </div>
        <div class="card-body">
          <div>
        {!! $feedback->message !!}
        </div>  
        </div>
    </div>
</div>

        <div class="col-md-3">
            <div class="card">
        <div class="card-header">
          Email and Phone Number 
        </div>
        <div class="card-body">
         <p>Email: {{ $feedback->email }}</p>
         <p>Phone: {{ $feedback->phone }}</p>
        </div>
    </div>
            
        </div>
        
    </div>

    <hr>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-md-2">

    {!! Html::linkRoute('feedbacks.edit', 'Edit', array($feedback->id), array('class'=>'btn btn-primary btn-block')) !!}

    </div>
    
    <div class="col-md-2">

        {!! Form::open(['route' => ['feedbacks.destroy', $feedback->id], 'method' => 'DELETE']) !!}
    
        {{ Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) }}
    
            {!! Form::close() !!}

    </div>
    </div>
</div>  
@endsection
