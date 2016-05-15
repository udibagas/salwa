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
		<div class="row no-gutter">
			<div class="col-md-4">
				{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search" class="form-control">
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-4">
				<a href="/peduli/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Peduli</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $pedulis->firstItem() }} to {{ $pedulis->lastItem() }} of {{ $pedulis->total() }} entries
					</b>
				</p>
			</div>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>User</th>
				<th>Kategori</th>
				<th style="width:150px;">Last Update</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pedulis as $a)
				<tr>
					<td>{{ $a->peduli_id }}</td>
					<td><a href="/peduli/{{ $a->peduli_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/peduli/'.$a->peduli_id]) !!}
						<a href="/peduli/{{ $a->peduli_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $pedulis->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop
