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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-question-circle"></i> TANYA USTADZ</h3>
		</div>
		<div class="panel-body">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th style="width:250px;">Judul Pertanyaan</th>
						<th>Penanya</th>
						<th>Jns. Kelamin</th>
						<th>Waktu Tanya</th>
						<th>Dijawab</th>
						<th>Penjawab</th>
						<th>Show</th>
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
						<td>
							{{ Form::select('dijawab_oleh', App\User::ustadz()->orderBy('name')->pluck('name', 'user_id'), request('dijawab_oleh'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
						</td>
						<td>
							{{ Form::select('status', ['s' => 'Yes', 'h' => 'No'], request('status'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
						</td>
						<td>
							<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
							<a href="/pertanyaan/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
						</td>
					</tr>
					{!! Form::close() !!}
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
						<td>{{ $p->user->jenis_kelamin == 'p' ? 'Pria' : 'Wanita' }}</td>
						<td>{{ $p->tgl_tanya }}</td>
						<td>
							@if ($p->jawaban)
								<span class="label label-success">Sudah</span>
							@else
								<span class="label label-default">Belum</span>
							@endif
						</td>
						<td>{{ $p->ustadz ? $p->ustadz->name : '' }}</td>
						<td>{!! $p->status == 's' ? '<b class="text-success">Y</b>' : '<b class="text-danger">N</b>' !!}</td>
						<td class="text-right">
							{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							<div class="btn-group">
								<a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
								<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
							</div>
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
