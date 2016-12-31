@extends('layouts.user')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PERTANYAAN MASUK',
		]
	])

@stop

@section('user-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-question-circle"></i> PERTANYAAN MASUK</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="judul_pertanyaan" value="{{ request('judul_pertanyaan') }}" placeholder="Judul Pertanyaan" class="form-control">

				<input type="text" name="user" value="{{ request('user') }}" placeholder="Penanya" class="form-control">

				<!-- {{ Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], request('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '-Jenis Kelamin-']) }} -->

				<!-- {{ Form::select('jawaban', ['belum' => 'Belum', 'sudah' => 'Sudah'], request('status'), ['class' => 'form-control', 'placeholder' => '-All-']) }} -->

				<!-- {{ Form::select('dijawab_oleh', App\User::ustadz()->orderBy('name')->pluck('name', 'user_id'), request('dijawab_oleh'), ['class' => 'form-control', 'placeholder' => '-Dijawab Oleh-']) }} -->

				{{ Form::select('status', ['s' => 'Yes', 'h' => 'No'], request('status'), ['class' => 'form-control', 'placeholder' => '-Show-']) }}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/pertanyaan/admin-ustadz" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@foreach ($pertanyaans as $p)
			<li class="list-group-item @if ($p->status == 'h') disabled @endif">
				<div class="pull-right">
					<a href="/pertanyaan/{{ $p->pertanyaan_id }}/jawab">Jawab</a> &bull;
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
				{{ $p->user->name }} ({{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}, {{ $p->daerah_asal }}) &bull;
				Tgl Tanya : {{ $p->tgl_tanya }}

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
			{!! $pertanyaans->appends(['judul_pertanyaan' => request('judul_pertanyaan'),'user' => request('user'),'jenis_kelamin' => request('jenis_kelamin'),'jawaban' => request('jawaban'),'dijawab_oleh' => request('dijawab_oleh'),'status' => request('status')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
