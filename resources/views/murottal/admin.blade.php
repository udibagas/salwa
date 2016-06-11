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

	<h4 class="title"><i class="fa fa-microphone"></i> MUROTTAL AL QUR'AN</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/murottal/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Murottal</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $murottals->firstItem() }} to {{ $murottals->lastItem() }} of {{ $murottals->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:180px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="nama_surat" value="{{ request('nama_surat') }}" class="form-control" placeholder="Nama Surat">
				</td>
				<td>
					{!! Form::select('group_id', \App\Group::active()->murottal()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/artikel/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $murottals->firstItem(); ?>
			@foreach ($murottals as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->nama_surat }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/murottal/'.$a->murotal_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/murottal/{{ $a->murotal_id }}/play" class="btn btn-info btn-xs"><i class="fa fa-play"></i> Play</a>
						<a href="/murottal/{{ $a->murotal_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $murottals->appends(['nama_surat' => request('nama_surat'),'group_id' => request('group_id')])->links() !!}
	</div>

@stop
