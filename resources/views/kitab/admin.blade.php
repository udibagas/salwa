@extends('layouts.cms')

@section('title') Kitab @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB & TERJEMAHAN'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>

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
				<a href="/kitab/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Kitab</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $kitabs->firstItem() }} to {{ $kitabs->lastItem() }} of {{ $kitabs->total() }} entries
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
				<th>Penulis</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $kitabs->firstItem(); ?>
			@foreach ($kitabs as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/kitab/{{ $a->buku_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->penulis }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/kitab/'.$a->buku_id]) !!}
						<a href="/kitab/{{ $a->buku_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $kitabs->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop
