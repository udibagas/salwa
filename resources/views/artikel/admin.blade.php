@extends('layouts.cms')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'AKTUAL'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-file-text"></i> SALWA AKTUAL</h4>

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
				<a href="/artikel/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Artikel</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $artikels->firstItem() }} to {{ $artikels->lastItem() }} of {{ $artikels->total() }} entries
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
			@foreach ($artikels as $a)
				<tr>
					<td>{{ $a->artikel_id }}</td>
					<td><a href="/artikel/{{ $a->artikel_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/artikel/'.$a->artikel_id]) !!}
						<a href="/artikel/{{ $a->artikel_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $artikels->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop
