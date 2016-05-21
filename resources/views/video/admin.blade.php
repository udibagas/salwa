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
		<a href="/video/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Video</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $videos->firstItem() }} to {{ $videos->lastItem() }} of {{ $videos->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>Youtube ID</th>
				<th>User</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $videos->firstItem(); ?>
			@foreach ($videos as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/video/{{ $a->video_id }}-{{ str_slug($a->title) }}">{{ $a->title }}</a></td>
					<td><a href="http://youtu.be/{{ $a->url_video_youtube }}" target="_blank">{{ $a->url_video_youtube }}</a></td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/video/'.$a->video_id]) !!}
						<a href="/video/{{ $a->video_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $videos->appends(['search' => request('search')])->links() !!}
	</div>

@stop
