@extends('layouts.main')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('content')

<h4 class="title"><i class="fa fa-question-circle"></i> PERTANYAAN MASUK</h4>

<div class="text-right text-bold" style="padding:10px;">
	Showing {{ $pertanyaans->firstItem() }} to {{ $pertanyaans->lastItem() }} of {{ $pertanyaans->total() }} entries
</div>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th style="width:250px;">Judul Pertanyaan</th>
			<th>Penanya</th>
			<th>Gender</th>
			<th>Tgl Tanya</th>
			<!-- <th>Dijawab</th> -->
			<th>Tgl Jawab</th>
			<th>Penjawab</th>
			<!-- <th>Show</th> -->
			<th style="width:170px;">Action</th>
		</tr>
		{!! Form::open(['method' => 'GET']) !!}
		<tr>
			<td></td>
			<td>
				<input type="text" name="judul_pertanyaan" value="{{ request('judul_pertanyaan') }}" placeholder="Judul Pertanyaan" class="form-control">
			</td>
			<td>
				<input type="text" name="user" value="{{ request('user') }}" placeholder="Penanya" class="form-control">
			</td>
			<td>
				{{ Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], request('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
			</td>
			<td></td>
			<td>
				{{ Form::select('jawaban', ['belum' => 'Belum', 'sudah' => 'Sudah'], request('status'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
			</td>
			<td></td>
			<td>
				{{ Form::select('dijawab_oleh', App\User::ustadz()->orderBy('name')->pluck('name', 'user_id'), request('dijawab_oleh'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
			</td>
			<td>
				{{ Form::select('status', ['s' => 'Yes', 'h' => 'No'], request('status'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
			</td>
			<td>
				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/pertanyaan/admin-ustadz" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
			</td>
		</tr>
		{!! Form::close() !!}
	</thead>
	<tbody>
		<?php $i = $pertanyaans->firstItem(); ?>
		@foreach ($pertanyaans as $p)
		<tr class="">
			<td>{{ $i++ }}</td>
			<td>
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
					{{ $p->judul_pertanyaan }}
				</a>
			</td>
			<td>{{ $p->user->name }}</td>
			<td>{{ $p->user->jenis_kelamin == 'p' ? 'Pria' : 'Wanita' }}</td>
			<td>{{ $p->tgl_tanya }}</td>
			<!-- <td>
				@if ($p->jawaban)
					<span class="label label-success">Sudah</span>
				@else
					<span class="label label-default">Belum</span>
				@endif
			</td> -->
			<td>{{ $p->tgl_jawab }}</td>
			<td>{{ $p->ustadz ? $p->ustadz->name : '' }}</td>
			<!-- <td>{!! $p->status == 's' ? '<b class="text-success">Y</b>' : '<b class="text-danger">N</b>' !!}</td> -->
			<td>
				{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
				{!! Form::hidden('redirect', url()->current()) !!}
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}/jawab" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Jawab</a>
				<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
				{!! Form::close() !!}

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $pertanyaans->appends(['judul_pertanyaan' => request('judul_pertanyaan'),'user' => request('user'),'jenis_kelamin' => request('jenis_kelamin'),'jawaban' => request('jawaban'),'dijawab_oleh' => request('dijawab_oleh'),'status' => request('status')])->links() !!}
</div>

@stop
