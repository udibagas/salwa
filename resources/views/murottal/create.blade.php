@extends('layouts.cms')

@section('title', 'Murottal : Create New Murottal')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal/admin' => 'MUROTTAL',
			'#' => 'New Murottal',
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-plus-circle"></i> Tambah Murottal Baru</h4>
	@include('murottal._form', ['url' => '/murottal', 'method' => 'POST'])

@stop
