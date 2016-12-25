@extends('layouts.main')

@section('title', 'Tanya Ustadz : Jawab Pertanyaan')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan/admin-ustadz' => 'TANYA USTADZ',
			'/pertanyaan/'.$pertanyaan->pertanyaan_id => str_limit($pertanyaan->judul_pertanyaan, 100),
			'#' => 'Jawab',
		]
	])

@stop

@section('content')

	<div class="col-sm-offset-2 col-sm-8">
		@include('pertanyaan.ustadz._form-jawab')
	</div>

	<div class="clearfix"></div>

@stop
