@extends('layouts.app')
@section('content')

<br>
<div class="container" style="background-color: #fff;">

	<h3 align="center" style="color: brown;"><strong> RECOMMENDED AUDIO MUSICS</strong></h3>
	<hr>
<br>
	@if(count($audio) > 0)
	
		<div class="row">
		@foreach($audio as $audios)
		<div class="col-md-4">
	<div class="card">
		<div class="card-header">
			<h4 align="center"><strong>{{ $audios->title}}</strong></h4>
			<!-- <small>Posted - {{$audios->created_at->diffForHumans()}} by Admin</small> -->

		</div>
		<div class="card-body">
	
				<p>{!! $audios->body !!}</p>
		</div>
	</div><br>
</div>
		@endforeach
	</div>
		
	 <h5 align="center"> {{ $audio->links() }} </h5>

	 <br>

	 <p style="text-align: center;"><a href="https://www.youtube.com/channel/UCqWJ9-ggTJrvGO8s8Gj53EA/" class="btn btn-secondary btn-lg"> Click for other audios</a></p>
		

	@else

	<h4>No Audio Found</h4>

	@endif
</div>


@endsection