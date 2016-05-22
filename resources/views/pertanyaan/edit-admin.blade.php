@extends('layouts.cms')

@section('title', 'Tanya Ustadz : Edit Pertanyaan')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan/admin' => 'TANYA USTADZ',
			'#' => 'Edit Pertanyaan'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-edit"></i> EDIT PERTANYAAN</h4>
	@include('pertanyaan._form-admin', ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id, 'method' => 'PUT'])

@stop
