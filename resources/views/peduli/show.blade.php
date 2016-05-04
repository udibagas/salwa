@extends('layouts.main')

@section('title') Salwa Peduli : {{ $peduli->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli' => 'SALWA PEDULI',
			'#' => $peduli->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $peduli->judul }}</h1><hr />
		<b>{{ $peduli->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $peduli->img_artikel }}" style="width:100%;margin-bottom:30px;" alt="" />

		{!! $peduli->isi !!}

		<hr>
		@include('layouts._share', ['url' => url('/peduli/'.$peduli->peduli_id.'-'.str_slug($peduli->judul))])
		<hr>

		<h4 class="title">SALWA PEDULI</h4>
		<div class="row">
			@foreach ($terkait as $t)
				@include('peduli._list', ['peduli' => $t])
			@endforeach
		</div>

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
