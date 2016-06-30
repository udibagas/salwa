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

	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<strong>
					{{ $pertanyaan->user ? $pertanyaan->user->name : '' }}
					@if ($pertanyaan->daerah_asal) ({{ $pertanyaan->daerah_asal }}) @endif
				</strong>

				<span class="text-muted">
					asked {{ $pertanyaan->tgl_tanya ? $pertanyaan->tgl_tanya->diffForHumans() : "" }}
					@if ($pertanyaan->group)
					on <a href="/pertanyaan/?group_id={{ $pertanyaan->group_id }}">{{ $pertanyaan->group->group_name }}</a>
					@endif
				</span>
			</div>
			<div class="panel-body">
				<h4 style="margin-top:0;font-weight:bold;">Pertanyaan : {{ $pertanyaan->judul_pertanyaan }}</h4>
				{!! $pertanyaan->ket_pertanyaan !!}
			</div>
		</div>

		@include('pertanyaan.ustadz._form-jawab')
	</div>

	<div class="clearfix"></div>

@stop
