@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="/peduli" class="btn btn-info">AKTUAL</a>
			<a href="/peduli/{{ $peduli->peduli_id }}" class="btn btn-info">{{ $peduli->judul }}</a>
		</div>
	</div>

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>{{ $peduli->judul }}</h1><hr />
		<b>{{ $peduli->user ? $peduli->user->name : '' }} | {{ $peduli->updated->diffForHumans() }}</b><br />
		<hr>

		<img src="http://www.salamdakwah.com/{{ $peduli->img_peduli }}" style="width:100%;margin-bottom:30px;" alt="" />

		{!! $peduli->isi !!}

		<hr>
		Share:
		<div class="btn-group">
			<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
		</div>

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
