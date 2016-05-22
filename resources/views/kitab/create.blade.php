@extends('layouts.cms')

@section('title', 'Kitab : Add New Kitab')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB & TERJEMAHAN',
			'#' => 'New Kitab',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Kitab Baru</h4>
	@include('kitab._form', ['url' => '/kitab', 'method' => 'POST'])

@stop
