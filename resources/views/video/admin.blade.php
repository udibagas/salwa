@extends('layouts.cms')

@section('title') Hadist @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video/admin' => 'HADIST'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-video-camera"></i> SALWA VIDEO</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<div class="row">
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
				<a href="/video/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Video</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $videos->firstItem() }} to {{ $videos->lastItem() }} of {{ $videos->total() }} entries
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
				<th>Type</th>
				<th>Youtube ID</th>
				<th>File FLV</th>
				<th>File 3GP</th>
				<th>User</th>
				<th style="width:150px;">Last Update</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $videos->firstItem(); ?>
			@foreach ($videos as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/video/{{ $a->video_id }}-{{ str_slug($a->title) }}">{{ $a->title }}</a></td>
					<td>{{ $a->type }}</td>
					<td>{{ $a->url_video_youtube }}</td>
					<td>{{ $a->file_flv }}</td>
					<td>{{ $a->file_3gp }}</td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/video/'.$a->video_id]) !!}
						<a href="/video/{{ $a->video_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $videos->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop