@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">SALWA PROMO</a>
			<a href="#" class="btn btn-info">AN NAJM Islamic School</a>
		</div>
	</div>

@stop

@section('content')

<h1>AN NAJM Islamic School</h1><hr />
<div class="row">
	<div class="col-md-8">

		<img src="/images/annajm.jpg" alt="" class="img img-responsive" />

		<hr>
		Share:
		<div class="btn-group">
			<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
		</div>
		<hr>

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
