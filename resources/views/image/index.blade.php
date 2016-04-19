@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">IMAGES</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">IMAGES</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($images as $v)
					@include('image._list', ['image' => $v])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{{ $images->links() }}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
