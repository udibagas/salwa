@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/artikel" class="btn btn-info">AKTUAL</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">AKTUAL</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($artikels as $a)
					@include('artikel._list', ['artikel' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $artikels->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
