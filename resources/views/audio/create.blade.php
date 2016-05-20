@extends('layouts.cms')

@section('title', 'Audio : Create New Audio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/audio/admin' => 'SALWA AUDIO',
			'#' => 'New Audio',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Audio Baru</h4>
	@include('audio._form', ['url' => '/audio', 'method' => 'POST'])

@stop
