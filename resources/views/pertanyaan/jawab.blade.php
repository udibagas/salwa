@extends('layouts.cms')

@section('title') Tanya Ustadz : Jawab @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan/admin' => 'TANYA USTADZ',
			'#' => 'Jawab',
		]
	])

@stop

@section('cms-content')

<h4 class="title"><i class="fa fa-edit"></i> JAWAB PERTANYAAN</h4>

<h3>Pertanyaan: {{ $model->judul_pertanyaan }}</h3>
{!! nl2br($model->ket_pertanyaan) !!}

<br>

@include('pertanyaan._form-jawab')

@stop
