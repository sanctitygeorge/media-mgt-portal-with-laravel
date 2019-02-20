@extends('layouts.app')
@section('content')

<br>
<div class="container" style="background-color: #fff;">

	<h3 align="center" style="color: brown;"><strong> RECOMMENDED VIDEOS</strong></h3>
	<hr>
<br>
	@if(count($video) > 0)
	
		<div class="row">
		@foreach($video as $videos)
		<div class="col-md-4">
	<div class="card">
		<div class="card-header">
			<h4 align="center"><strong>{{ $videos->title}}</strong></h4>
			<!-- <small>Posted - {{$videos->created_at->diffForHumans()}} by Admin</small> -->

		</div>
		<div class="card-body">
	
				<p>{!! $videos->body !!}</p>
		</div>
	</div><br>
</div>
		@endforeach
	</div>
		
	 <h5 align="center"> {{ $video->links() }} </h5>

	 <br>
	 <p style="text-align: center;"><a href="https://www.youtube.com/channel/UCqWJ9-ggTJrvGO8s8Gj53EA/" class="btn btn-secondary btn-lg"> Click for other videos</a></p>

	@else

	<h4>No Videos Found</h4>

	@endif
</div>


@endsection