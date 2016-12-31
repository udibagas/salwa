@extends('layouts.user')

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

@section('user-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">JAWAB PERTANYAAN</h3>
		</div>
		<div class="panel-body">
			@include('pertanyaan.ustadz._form-jawab')
		</div>
	</div>

@stop
