@extends('layouts.cms')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('cms-content')

<h4 class="title"><i class="fa fa-question-circle"></i> TANYA USTADZ</h4>

<div class="well well-sm" style="margin-bottom:10px;">
	<div class="row">
		<div class="col-md-4">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<div class="form-group">
					<div class="input-group">
						<input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="form-control">
						<div class="input-group-addon"><i class="fa fa-search"></i></div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="col-md-8 text-right">
			<p style="padding:5px 5px 0 0;">
				<b>
					Showing {{ $pertanyaans->firstItem() }} to {{ $pertanyaans->lastItem() }} of {{ $pertanyaans->total() }} entries
				</b>
			</p>
		</div>
	</div>
</div>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Judul Pertanyaan</th>
			<th>Penanya</th>
			<th>Jns. Kelamin</th>
			<th>Waktu Tanya</th>
			<th>Dijawab</th>
			<th>Penjawab</th>
			<th>Show</th>
			<th style="width:140px;">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = $pertanyaans->firstItem(); ?>
		@foreach ($pertanyaans as $p)
		<tr>
			<td>{{ $i++ }}</td>
			<td>
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
					{{ $p->judul_pertanyaan }}
				</a>
			</td>
			<td>{{ $p->user->name }}</td>
			<td>{{ $p->user->jenis_kelamin == 'P' ? 'Pria' : 'Wanita' }}</td>
			<td>{{ $p->created->diffForHumans() }}</td>
			<td>
				@if ($p->jawaban)
					<span class="label label-success">Sudah</span>
				@else
					<span class="label label-default">Belum</span>
				@endif
			</td>
			<td>{{ $p->ustadz ? $p->ustadz->name : '' }}</td>
			<td>{!! $p->status == 's' ? '<b class="text-success">Y</b>' : '<b class="text-danger">N</b>' !!}</td>
			<td>
				{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
				<!-- <a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a> -->
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Jawab</a>
				<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
				{!! Form::close() !!}

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $pertanyaans->appends(['search' => request('search')])->links() !!}
</div>

@stop
