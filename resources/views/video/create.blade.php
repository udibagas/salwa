@extends('layouts.cms')

@section('title', 'Video : Add New Video')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video/admin' => 'VIDEO',
			'#' => 'New Video',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Video Baru</h4>
	@include('video._form', ['url' => '/video', 'method' => 'POST'])

@stop
