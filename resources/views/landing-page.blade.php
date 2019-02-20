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

      <div class="container">
	<div class="card">
		 <div class="card-header">
		 	<h3 align="center">Ann Media Records Official Home</h3>
		</div>
		<div class="card-body">
       
			<!-- <div class="container"> -->
   <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <!-- <div class="jumbotron" style="background-color:brown;"> -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <!-- <img src="" alt="slide 1" style="background-image: url('img/slide/banner 1.jpg');"> -->
          <img class="mx-auto d-block img-fluid" src= "{{ asset('img/slide1.jpg') }}" alt="slide 1" class="img-responsive" style="width:100%; height:350px;">

          <div class="carousel-caption">
    <h4 style="color:#fff;">Music is life</h4>
  	</div>
        </div>
        <div class="carousel-item">
          <img class="mx-auto d-block img-fluid" src= "{{ asset('img/slide2.jpg') }}" alt="slide 2" style="width:100%; height:350px;">
          <div class="carousel-caption">
    <h4 style="color:#fff;">Music is life</h4>
  	</div> 
        </div>

        <div class="carousel-item">
          <img class="mx-auto d-block img-fluid" src= "{{ asset('img/slide3.jpg') }}" alt="slide 3" style="width:100%; height:350px;">
          <div class="carousel-caption">
    <h4 style="color:#fff;">Music is life</h4>
  	</div>
        </div>


      </div>
    </div>

    <!-- Left and right controls -->
    <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a> -->

  <!-- </div>
</div> -->
		</div>

	</div>

	<br>
  @include('shortcuts.social-media-handles')	
  
  <br><br>
  <h5 align="center" style="color: brown;"><strong>TRENDING </strong></h5>
  <hr>

   @if(count($audio) > 0)
	
		<div class="row">
		@foreach($audio as $audio)
		<div class="col-md-4">
	<div class="card">
		<div class="card-header">
			<h5 align="center"><strong>{{ $audio->title}}</strong></h5>
			<small>Posted - {{$audio->created_at->diffForHumans()}} by Admin</small>

		</div>
		<div class="card-body">
	
				<p>{!! $audio->body !!}</p>
		</div>
	</div><br>
</div>
		@endforeach
	</div>

	
	<br>

		<p style="text-align: center;"><a href="{{ route('audios') }}" class="btn btn-secondary btn-lg"> Click to view all</a></p>
		
	
	@else

	<h4 align="center">Check Later!</h4>

	@endif
<br>
<br>
  <h5 align="center" style="color: brown;"><strong>FEATURED VIDEOS</strong></h5>
  <hr>

  @if(count($video) > 0)
	
		<div class="row">
		@foreach($video as $videos)
		<div class="col-md-4">
	<div class="card">
		<div class="card-header">
			<h4 align="center"><strong>{{ $videos->title}}</strong></h4>
			<small>Posted - {{$videos->created_at->diffForHumans()}} by Admin</small>

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

	<p style="text-align: center;"><a href="{{ route('videos') }}" class="btn btn-secondary btn-lg"> Click to view all</a></p>

	@else

	<h4 align="center">Check Later!</h4>

	@endif
<br>
<br>
<h5 align="center" style="color: brown;"><strong>FEATURED POSTS AND EVENTS</strong></h5>
<hr>

@if(count($post) > 0)
	
		<div class="row">
		@foreach($post as $posts)
		<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<h4 align="center"><strong><a href="{{ route('posts', $posts->slug) }}">{{ $posts->title}}</a></strong></h4>
			<small>Posted - {{$posts->created_at->diffForHumans()}} by Admin</small>

		</div>
		<div class="card-body">
			<a href="{{ route('posts', $posts->slug) }}">
			<img class="mx-auto d-block img-fluid" src= "{{ asset($posts->image) }}" alt="post-image" class="img-responsive" style="width:100%;"></a>
			<hr>
				<p>{!!substr(strip_tags($posts->body), 0, 25) !!}<a class="btn btn-default" href="{{ route('posts', $posts->slug) }}">Read More &raquo;</a></p></p>
			
		</div>
	</div><br>
</div>
		@endforeach
	</div>

	<h5 align="center"> {{ $post->links() }} </h5>
		
<br>
		<p style="text-align: center;"><a href="{{ route('posts') }}" class="btn btn-secondary btn-lg"> Click to view all posts</a></p>

	@else

	<h4>No Posts Found</h4>

	@endif


</div>



@endsection