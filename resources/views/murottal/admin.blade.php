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
		<div class="row no-gutter">
			<div class="col-md-4">
				{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="search" value="{{ request('search') }}" placeholder="Search" class="form-control">
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-4">
				<a href="/murottal/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Murottal</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $murottals->firstItem() }} to {{ $murottals->lastItem() }} of {{ $murottals->total() }} entries
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
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $murottals->firstItem(); ?>
			@foreach ($murottals as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/murottal/{{ $a->murotal_id }}-{{ str_slug($a->nama_surat) }}">{{ $a->nama_surat }}</a></td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/murottal/'.$a->murotal_id]) !!}
						<a href="/murottal/{{ $a->murotal_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $murottals->appends(['search' => request('search')])->links() !!}
	</div>

@stop
