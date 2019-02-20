@extends('layouts.app')

@section('content')

<br>
<div class ="container">


    @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">

            <div class="col-md-4">
         <a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i> Dashboard</a>
    </div>
        <div class="col-md-4">
    <a href="{{ route('feedbacks.create') }}" class="btn btn-primary">Create Feedback &nbsp;</a>
        </div>
            <div class="col-md-4">
        <h3 align="right">
        <a href="{{ route('feedbacks.truncate') }}" class="btn btn-sm btn-danger">Delete All Feedbacks</a>
        </h3>
    </div>
                
            </div>

        </div>

   

<h3 align="center">
<br>User Feedbacks
</h3>
<br>

@if(count($feedback) > 0)

<div class="container" style="background-color: #fff;">
    <div class="row">
        <div class="col-md-12">
<table class="table table-stripped">
    <tr>
    	<th>ID</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Time</th>
        <th>Actions</th>
    </tr>

    @foreach($feedback as $feedbacks)
        <tr>
        	<td>{{$feedbacks->id}}</td>
            <td>{{$feedbacks->name}}</td>
            <td>{{$feedbacks->subject}}</td>
             <td>{!! $feedbacks->message !!}</td>
            <td>{{$feedbacks->phone}}</td>
            <td>{{$feedbacks->email}}</td>
            <td>{{$feedbacks->created_at->diffForHumans()}}</td>
            <td>
            	<a href="{{ route('feedbacks.show', $feedbacks->id)}}" class=" btn btn-info btn-sm"> View </a>
            	<a href="{{ route('feedbacks.edit', $feedbacks->id)}}" class="btn btn-secondary btn-sm" >Edit</
        	</td>
        	
        </tr>
    @endforeach

    <h5 align="center"> {{ $feedback->links() }} </h5>

</table>
@else
 <p>No Feedbacks found</p>
@endif
                             
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
