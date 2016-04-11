@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">SALWA IMAGE</a>
			<a href="#" class="btn btn-info">Tatkala Kematian Menjelang</a>
		</div>
	</div>

@stop

@section('content')

	<h1>Tatkala Kematian Menjelang</h1><hr>

	<div class="row">
		<div class="col-md-8">
			<div class="thumbnail">
				<img src="/images/image1.jpg" style="width:100%" alt="">
				<div class="caption">
					<h4 class="text-center">Tatkala Kematian Menjelang</h4>
				</div>
			</div>
			Share:
			<div class="btn-group text-center">
				<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
				<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
				<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
				<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
				<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
			</div>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
