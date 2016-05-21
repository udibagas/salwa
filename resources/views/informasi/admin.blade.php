@extends('layouts.cms')

@section('title') Informasi @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi/admin' => 'INFORMASI'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-newspaper-o"></i> SALWA INFO</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/informasi/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Informasi</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $informasis->firstItem() }} to {{ $informasis->lastItem() }} of {{ $informasis->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<!-- <th>User</th> -->
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $informasis->firstItem(); ?>
			@foreach ($informasis as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/informasi/{{ $a->informasi_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<!-- <td>{{ $a->user ? $a->user->name : '' }}</td> -->
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/informasi/'.$a->informasi_id]) !!}
						<a href="/informasi/{{ $a->informasi_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $informasis->appends(['search' => request('search')])->links() !!}
	</div>

@stop
