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
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">
				</td>
				<td>
					<input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User">
				</td>
				<td>
					{!! Form::select('group_id', \App\Group::active()->peduli()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/peduli/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
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
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/peduli/{{ $a->peduli_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $pedulis->appends(['judul' => request('judul'),'group_id' => request('group_id'),'user' => request('user')])->links() !!}
	</div>

@stop
