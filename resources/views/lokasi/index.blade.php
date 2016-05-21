@extends('layouts.cms')

@section('title', 'Lokasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/lokasi' => 'LOKASI'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-map"></i> LOKASI</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/lokasi/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Lokasi</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $lokasis->firstItem() }} to {{ $lokasis->lastItem() }} of {{ $lokasis->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="nama_lokasi" value="{{ request('nama_lokasi') }}" class="form-control" placeholder="Name">
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/lokasi" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $lokasis->firstItem(); ?>
			@foreach ($lokasis as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->nama_lokasi }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/lokasi/'.$a->id_lokasi]) !!}
						<a href="/lokasi/{{ $a->id_lokasi }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $lokasis->appends(['nama_lokasi' => request('nama_lokasi')])->links() !!}
	</div>

@stop
