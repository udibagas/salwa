@extends('layouts.cms')

@section('title', 'Salwa Video')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video/admin' => 'SALWA VIDEO'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-video-camera"></i> SALWA VIDOE</h3>
		</div>
		<div class="panel-body">
			<a href="/video/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> ADD NEW VIDEO
			</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Video">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/video/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($videos->total() == 0)
			<li class="list-group-item text-center">Tidak ada video</li>
			@endif
			@foreach ($videos as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/video/{{ $a->video_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-video-{{$a->video_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/video/'.$a->video_id, 'style' => 'display:none;', 'id' => 'delete-video-'.$a->video_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				<a href="{{ $a->url }}" class="text-bold">{{ $a->title }}</a><br>
				@if ($a->user)
				<a href="/video?user_id={{ $a->user_id }}">{{ $a->user->name }}</a> &bull;
				@endif

				@if ($a->url_video_youtube)
				<a href="http://youtu.be/{{ $a->url_video_youtube }}" target="_blank">YouTube</a> &bull;
				@endif
				{{ $a->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $videos->firstItem() }} to {{ $videos->lastItem() }} of {{ $videos->total() }} entries
			</div>
			{!! $videos->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
