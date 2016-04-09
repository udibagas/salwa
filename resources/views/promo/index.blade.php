@extends('layouts.main')

@section('content')

	<h1 class="title">SALWA PROMO</h1>

	<div class="row">
		<div class="col-md-8">
			<p><img src="/images/annajm.jpg" alt="" class="img img-responsive img-thumbnail" /></p>

			<p><img src="/images/tokobuku.jpg" alt="" class="img img-responsive img-thumbnail" /></p>

			<p><img src="/images/lugualami.jpg" alt="" class="img img-responsive img-thumbnail" /></p>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
