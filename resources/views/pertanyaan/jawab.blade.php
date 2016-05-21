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


<div class="well">
	<strong><i class="fa fa-user"></i> {{ $pertanyaan->user->name }}</strong><br>
	<em><i class="fa fa-clock-o"></i> {{ $pertanyaan->created->diffForHumans() }}</em>

	<h3>Pertanyaan: {{ $pertanyaan->judul_pertanyaan }}</h3>
	{!! nl2br($pertanyaan->ket_pertanyaan) !!}
</div>

@include('pertanyaan._form-jawab')

@stop
