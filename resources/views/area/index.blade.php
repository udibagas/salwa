@extends('layouts.cms')

@section('title', 'Area')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/area' => 'AREA'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-map"></i> LOKASI</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/area/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Area</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $areas->firstItem() }} to {{ $areas->lastItem() }} of {{ $areas->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Lokasi</th>
				<th>Area</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					{!! Form::select('id_lokasi', \App\Lokasi::orderBy('nama_lokasi', 'ASC')->pluck('nama_lokasi', 'id_lokasi'), request('id_lokasi'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td>
					<input type="text" name="nama_area" value="{{ request('nama_area') }}" class="form-control" placeholder="Nama Area">
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/area" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $areas->firstItem(); ?>
			@foreach ($areas as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->lokasi ? $a->lokasi->nama_lokasi : '' }}</td>
					<td>{{ $a->nama_area }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/area/'.$a->id_area]) !!}
						<a href="/area/{{ $a->id_area }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $areas->appends(['nama_area' => request('nama_area'),'id_lokasi' => request('id_lokasi')])->links() !!}
	</div>

@stop
