@extends('layouts.main')

@section('title') Search : {{ $search }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'Search : '.$search,
		]
	])

@stop

@section('content')

	<h3 class="text-center">Hasil pencarian untuk "{{ $search }}" (Top 10)</h3>
	<hr>

	<div class="row">
		<div class="col-md-6">
			<h4 class="title">Video</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Artikel</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Informasi</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Peduli</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Forum</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Tanya Ustadz</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Kitab</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Doa</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Dzikir</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Hadist</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Audio</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Images</h4>

		</div>
		<div class="col-md-6">
			<h4 class="title">Promo</h4>

		</div>
	</div>

@stop
