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

			<hr>

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
						<th>Show</th>
						<th style="width:170px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $pertanyaans->firstItem(); ?>
					@foreach ($pertanyaans as $p)
					<tr class="@if ($p->status == 'h') danger @endif">
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
						<td>{!! $p->status == 's' ? '<b class="text-success">Y</b>' : '<b class="text-danger">N</b>' !!}</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							<a href="/pertanyaan/{{ $p->pertanyaan_id }}/jawab" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Jawab</a>
							<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
							{!! Form::close() !!}

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $pertanyaans->firstItem() }} to {{ $pertanyaans->lastItem() }} of {{ $pertanyaans->total() }} entries
			</div>
			{!! $pertanyaans->appends(['judul_pertanyaan' => request('judul_pertanyaan'),'user' => request('user'),'jenis_kelamin' => request('jenis_kelamin'),'jawaban' => request('jawaban'),'dijawab_oleh' => request('dijawab_oleh'),'status' => request('status')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
