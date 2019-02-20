@extends('layouts.app')
@section('content')

<br>
<div class="container" style="background-color: #fff;">

	<div class="card">
		<div class="card-header">
			<h3 align="center" style="color: brown;"><strong> OUR TEAM MEMBERS</strong></h3>
		</div>
	</div>
	<!-- <h3 align="center" style="color: brown;"><strong> OUR UPDATES</strong></h3>
	<hr> -->
<br>
	@if(count($team) > 0)
	
		
		@foreach($team as $teams)
		
	<div class="card">
		<div class="card-body">
			<div class="row">
			<div class="col-md-6">
			<img class="mx-auto d-block img-fluid" src= "{{ asset($teams->image) }}" alt="team-image" class="img-responsive" style="width:30%;">
			<hr>
				<p align="center"> Hotline: <a href="tel: {{$teams->phone}}">{{$teams->phone}}</a></p>
			
		</div>

		<div class="col-md-6">
			
				<p>{!! $teams->biography!!}</p>
		</div>
	</div><br>
</div>
		@endforeach
	</div>

	

	@else

	<h4 align="center">Under Construction</h4>

	@endif
</div>


@endsection