@extends('layouts.cms')

@section('title') Salwa Audio @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/mp3/admin' => 'SALWA AUDIO'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-music"></i> SALWA AUDIO</h4>

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
				<a href="/mp3/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Audio</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $audios->firstItem() }} to {{ $audios->lastItem() }} of {{ $audios->total() }} entries
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
				<th style="width:150px;">Last Update</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $audios->firstItem(); ?>
			@foreach ($audios as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/mp3/{{ $a->mp3_download_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/mp3/'.$a->mp3_download_id]) !!}
						<a href="/mp3/{{ $a->mp3_download_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $audios->appends(['search' => request('search')])->links() !!}
	</div>

@stop
