@extends('layouts.cms')

@section('title') Peduli @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'INFORMASI'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/peduli/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Peduli</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $pedulis->firstItem() }} to {{ $pedulis->lastItem() }} of {{ $pedulis->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>User</th>
				<th>Kategori</th>
				<th style="width:150px;">Created</th>
				<th style="width:150px;">Updated</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $pedulis->firstItem(); ?>
			@foreach ($pedulis as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/peduli/{{ $a->peduli_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/peduli/'.$a->peduli_id]) !!}
						<a href="/peduli/{{ $a->peduli_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $pedulis->appends(['search' => request('search')])->links() !!}
	</div>

@stop
