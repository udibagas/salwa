@extends('layouts.cms')

@section('title', 'Ustadz : Add New Ustadz')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/ustadz/admin' => 'USTADZ',
			'#' => 'New Ustadz',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Ustadz Baru</h4>
	@include('ustadz._form', ['url' => '/ustadz', 'method' => 'POST'])

@stop
