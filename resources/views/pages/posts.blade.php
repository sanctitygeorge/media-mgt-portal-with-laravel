@extends('layouts.app')
@section('content')

<br>
<div class="container" style="background-color: #fff;">

	<div class="card">
		<div class="card-header">
			<h3 align="center" style="color: brown;"><strong> OUR UPDATES</strong></h3>
		</div>
	</div>
	<!-- <h3 align="center" style="color: brown;"><strong> OUR UPDATES</strong></h3>
	<hr> -->
<br>
	@if(count($post) > 0)
	
		<div class="row">
		@foreach($post as $posts)
		<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<h4 align="center"><strong>{{ $posts->title}}</strong></h4>
			<small>Posted - {{$posts->created_at->diffForHumans()}} by Admin</small>

		</div>
		<div class="card-body">
			<img class="mx-auto d-block img-fluid" src= "{{ asset($posts->image) }}" alt="post-image" class="img-responsive" style="width:100%;">
			<hr>
			<!-- <div class="jumbotron"> -->
				<p>{!! $posts->body !!}</p>
			<!-- </div> -->
		</div>
	</div><br>
</div>
		@endforeach
	</div>

	<h5 align="center"> {{ $post->links() }} </h5>
		

	@else

	<h4>No Posts Found</h4>

	@endif
</div>


@endsection