@extends('layouts.cms')

@section('title', 'Tanya Ustadz')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-question-circle"></i> TANYA USTADZ</h3>
		</div>
		<div class="panel-body">

			@if (request('status') == 'h')
			<a class="btn btn-primary" href="/pertanyaan/admin?q={{ request('q') }}">Tampilkan semua pertanyaan</a>
			@else
			<a class="btn btn-primary" href="/pertanyaan/admin?q={{ request('q') }}&status=h">Hanya tampilkan pertanyaan yang belum dijawab</a>
			@endif

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="hidden" name="status" value="{{ request('status') }}">
				<input type="text" name="q" value="{{ request('q') }}" placeholder="Search Pertanyaan" class="form-control">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/pertanyaan/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($pertanyaans->total() == 0)
			<li class="list-group-item text-center">Tidak ada pertanyaan</li>
			@endif
			@foreach ($pertanyaans as $p)
			<li class="list-group-item @if ($p->status == 'h') disabled @endif">
				<div class="pull-right">
					<a href="/pertanyaan/{{ $p->pertanyaan_id }}/jawab">
						{{ $p->status == 's' ? 'Edit jawaban' : 'Jawab' }}
					</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-pertanyaan-{{$p->pertanyaan_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id, 'style' => 'display:none;', 'id' => 'delete-pertanyaan-'.$p->pertanyaan_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($p->group)
				<a href="/pertanyaan?group_id={{ $p->group_id }}" class="text-bold">
					[{{ $p->group->group_name }}]
				</a>
				@endif
				<a href="{{ $p->url }}" class="text-bold">
					{{ $p->judul_pertanyaan }}
				</a><br>
				@if ($p->user)
				{{ $p->user->name }} , {{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }},
				@endif
				{{ $p->daerah_asal }} &bull; {{ $p->tgl_tanya->diffForHumans() }}

				@if ($p->status == 's')
				&bull; Tgl Jawab : {{ $p->tgl_jawab }} &bull;
				Ustadz : {{ $p->ustadz ? $p->ustadz->name : '' }}
				@endif
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $pertanyaans->firstItem() }} to {{ $pertanyaans->lastItem() }} of {{ $pertanyaans->total() }} entries
			</div>
			{!! $pertanyaans->appends(['q' => request('q'), 'status' => request('status')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
