@extends('layouts.app')

@section('content')

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
        </div>


<div class="container" style="background-color: #fff;"><br>
	<div class="row">
	<div class="col-md-2">
	<a href="{{ route('home') }}"><i class="fa fa-fw fa-home"></i> Dashboard</a>
		</div>
	
	<div class="col-md-2">
	<a href="{{ route('videos.create') }}" class="btn btn-primary">Create Video &nbsp;</a>
		</div>

        <div class="col-md-4">
        <form action="{{ route('videos.index') }}" method="GET" class="form-inline" style="padding-left:60px;">
    <input type="text" name="search" id="search" value="{{ request()->input('search') }}"  placeholder="Search for videos" required>
    <button type="submit" style="padding-right:10px;"><i class="fa fa-search" style="width:30px;"></i></button>
        </form>
        </div>

     <div class="col-md-4">
		<h3 align="right">
		<a href="{{ route('videos.truncate') }}" class="btn btn-sm btn-danger">Delete All Videos</a>
		</h3>
	</div>

	</div>
	<hr>
	<br>

          

   

<h3 align="center">Your Videos</h3>
<br>

@if(count($video) > 0)

<div class="container" style="background-color: #fff;">
    <div class="row">
        <div class="col-md-12">
<table class="table table-stripped">
    <tr>
    	<th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Featured</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>

    @foreach($video as $videos)
        <tr>
        	<td>{{$videos->id}}</td>
            <td>{{$videos->title}}</td>
             <td>{!! $videos->body !!}</td>
            <td>{{$videos->featured}}</td>
            <td>{{$videos->created_at->diffForHumans()}}</td>
            <!-- <td><a href="#" class="btn btn-secondary">Edit</a></td> -->
            <td>
            	<a href="{{ route('videos.show', $videos->id)}}" class=" btn btn-info btn-sm"> View </a>
            	<a href="{{ route('videos.edit', $videos->id)}}" class="btn btn-secondary btn-sm" >Edit</
        	</td>
        	
        </tr>
    @endforeach

    <h5 align="center"> {{ $video->links() }} </h5>

</table>
@else
 <p>No Video found</p>
@endif
                             
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
