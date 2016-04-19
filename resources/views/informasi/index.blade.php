@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/informasi" class="btn btn-info">INFORMASI</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">INFORMASI</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($informasis as $a)
					@include('informasi._list', ['informasi' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $informasis->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
