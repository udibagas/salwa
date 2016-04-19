@extends('layouts.main')

@section('title') Image : {{ $image->judul }} @stop

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/image" class="btn btn-info">IMAGES</a>
			<a href="#" class="btn btn-info">{{ $image->judul }}</a>
		</div>
	</div>

@stop

@section('content')

<h1>{{ $image->judul }}</h1><hr />
<div class="row">
	<div class="col-md-8">
		<img src="http://www.salamdakwah.com/{{ $image->img_images }}" alt="" class="img img-responsive" style="width:100%" />

		<hr>
		@include('layouts._share', ['url' => url('/image/'.$image->id_salwaimages.'-'.str_slug($image->judul))])
		<hr>

		<h4 class="title">IMAGE TERKAIT</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('image._list', ['image' => $t])
			@endforeach
		</div>
	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
