@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/peduli" class="btn btn-info">PEDULI</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">PEDULI</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@foreach ($pedulis as $a)
					@include('peduli._list', ['peduli' => $a])
				@endforeach
			</div>

			<hr>
			<nav class="text-center">
				{!! $pedulis->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
