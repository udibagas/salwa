@extends('layouts.main')

@section('title') Tanya Ustadz : Jawab @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan/admin-ustadz' => 'TANYA USTADZ',
			'#' => 'Jawab',
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('pertanyaan._group')
	</div>
	<div class="col-md-9">
		<h4 class="title"><i class="fa fa-edit"></i> JAWAB PERTANYAAN</h4>

		<div class="well">
			<strong>
				<i class="fa fa-user"></i> {{ $pertanyaan->user->name }}
				@if ($pertanyaan->daerah_asal) ({{ $pertanyaan->daerah_asal }}) @endif
			</strong><br>
			<em>
				@if ($pertanyaan->group)
				<a href="/pertanyaan/admin/?group_id={{ $pertanyaan->group_id }}"><i class="fa fa-hashtag"></i> {{ $pertanyaan->group->group_name }}</a>
				@endif
				<i class="fa fa-clock-o"></i> {{ $pertanyaan->created->diffForHumans() }}
			</em>

			<h3>Pertanyaan: {{ $pertanyaan->judul_pertanyaan }}</h3>
			{!! nl2br($pertanyaan->ket_pertanyaan) !!}
		</div>

		@include('pertanyaan.ustadz._form-jawab')
	</div>
</div>

@stop
