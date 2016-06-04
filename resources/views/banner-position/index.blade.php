@extends('layouts.cms')

@section('title', 'Lokasi')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/position' => 'BANNER POSITION'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-map"></i> BANNER POSITION</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/position/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Posisi</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $positions->firstItem() }} to {{ $positions->lastItem() }} of {{ $positions->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Width</th>
				<th>Height</th>
				<th>Type</th>
				<th style="width:170px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $positions->firstItem(); ?>
			@foreach ($positions as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->width }}</td>
					<td>{{ $a->height }}</td>
					<td>{{ $a->banner_type }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/position/'.$a->position_id]) !!}
						<a href="/position/{{ $a->position_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $positions->links() !!}
	</div>

@stop
