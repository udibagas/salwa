@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">VIDEO</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">VIDEO</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($videos as $v)
					@include('video._list', ['video' => $v])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{{ $videos->links() }}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
