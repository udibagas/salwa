@extends('layouts.cms')

@section('title') Salwa Audio @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal/admin' => 'MUROTTAL'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-microphone"></i> MUROTTAL AL QUR'AN</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="nama_surat" value="{{ request('nama_surat') }}" class="form-control" placeholder="Nama Surat">

				{!! Form::select('group_id', \App\Group::active()->murottal()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-Semua Kategori-']) !!}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/artikel/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/murottal/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> ADD NEW MUROTTAL</a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th style="width:250px;">Play</th>
						<th style="width:150px;">Created At</th>
						<th style="width:150px;">Updated At</th>
						<th style="width:130px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $murottals->firstItem(); ?>
					@foreach ($murottals as $a)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $a->nama_surat }}</td>
							<td>{{ $a->group ? $a->group->group_name : '' }}</td>
							<td>
								<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $a->file_mp3 }}" type="application/ogg"></source></audio>
							</td>
							<td>{{ $a->created }}</td>
							<td>{{ $a->updated }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/murottal/'.$a->murotal_id]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<div class="btn-group">
									<a href="/murottal/{{ $a->murotal_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
				Showing {{ $murottals->firstItem() }} to {{ $murottals->lastItem() }} of {{ $murottals->total() }} entries
			</div>
			{!! $murottals->appends(['nama_surat' => request('nama_surat'),'group_id' => request('group_id')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
