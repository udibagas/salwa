@extends('layouts.cms')

@section('title', 'Artikel : Add New Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist/admin' => 'HADIST',
			'#' => 'New Hadist',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Hadist Baru</h4>
	@include('hadist._form', ['url' => '/hadist', 'method' => 'POST'])

@stop
