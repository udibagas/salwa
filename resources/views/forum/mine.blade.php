@extends('layouts.user')

@section('title', 'Forum Saya')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM SAYA',
		]
	])

@stop

@section('user-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<!-- <a href="/forum/hapus-semua-forum-saya" class="pull-right confirm">Hapus semua forum yang belum disetujui</a> -->
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> FORUM SAYA</h3>
		</div>
		<div class="panel-body">
			<a href="/forum/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> BUAT FORUM BARU
			</a>

			@if (request('status') == 'a')
			<a class="btn btn-primary" href="/forum-saya?q={{ request('q') }}">Tampilkan semua forum</a>
			@else
			<a class="btn btn-primary" href="/forum-saya?q={{ request('q') }}&status=a">Hanya tampilkan forum yang sudah disetujui</a>
			@endif

			{!! Form::open(['class' => 'form-inline pull-right', 'method' => 'GET']) !!}
				{!! Form::text('q', request('q'), ['placeholder' => 'Search Forum', 'class' => 'form-control']) !!}
				<input type="hidden" name="status" value="{{ request('status') }}">
				<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/forum-saya" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($forums->total() == 0)
			<li class="list-group-item text-center">Tidak ada forum</li>
			@endif
			@foreach ($forums as $f)
			<li class="list-group-item @if ($f->status == 'b') disabled @endif">
				<div class="pull-right">
					<a href="/forum/{{ $f->forum_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-forum-{{$f->forum_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/forum/'.$f->forum_id, 'style' => 'display:none;', 'id' => 'delete-forum-'.$f->forum_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				<a href="{{ $f->url }}"> <strong>{{ $f->title }}</strong> </a><br>
				<a href="/forum-category/{{ $f->group_id }}">{{ $f->group->group_name }}</a> &bull;
				{{ $f->posts()->count() }} komentar &bull;
				{{ $f->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		@if ($forums->total() > 0)
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $forums->firstItem() }} to {{ $forums->lastItem() }} of {{ $forums->total() }} entries
			</div>
			{!! $forums->appends(['q' => request('q'), 'status' => request('status')])->links() !!}
			<div class="clearfix"></div>
		</div>
		@endif
	</div>

@stop
