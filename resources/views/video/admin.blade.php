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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">
				<i class="fa fa-video-camera"></i> SALWA VIDEO
			</h3>
		</div>
		<div class="panel-body">

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
			<label for="">FILTER : </label>
				<input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Judul">
				<input type="text" name="url_video_youtube" value="{{ request('url_video_youtube') }}" class="form-control" placeholder="Youtube ID">
				<input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User">

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/video/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/video/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> ADD NEW VIDEO</a>
			{!! Form::close() !!}

			<hr>

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
							<td><a href="{{ $a->url }}">{{ $a->title }}</a></td>
							<td><a href="http://youtu.be/{{ $a->url_video_youtube }}" target="_blank">{{ $a->url_video_youtube }}</a></td>
							<td>{{ $a->user ? $a->user->name : '' }}</td>
							<td>{{ $a->created }}</td>
							<td>{{ $a->updated }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/video/'.$a->video_id]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<div class="btn-group">
									<a href="/video/{{ $a->video_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
								</div>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<b class="pull-right">
				Showing {{ $videos->firstItem() }} to {{ $videos->lastItem() }} of {{ $videos->total() }} entries
			</b>
			{!! $videos->appends(['title' => request('title'),'url_video_youtube' => request('url_video_youtube'),'user' => request('user')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
