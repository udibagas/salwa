@extends('layouts.cms')

@section('title', 'Banner Position : Add Position')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/position' => 'BANNER POSITION',
			'#' => 'New Position',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Posisi Baru</h4>
	@include('lokasi._form', ['url' => '/position', 'method' => 'POST'])

@stop
