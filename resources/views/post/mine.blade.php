@extends('layouts.user')

@section('title', 'Komentar Forum Saya')

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
			<!-- <a href="/post/hapus-semua-post-saya" class="pull-right confirm">Hapus semua post saya</a> -->
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> KOMENTAR FORUM SAYA</h3>
		</div>
		<div class="panel-body">
			<div class="pull-right">
				{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
					{!! Form::text('q', request('q'), ['placeholder' => 'Search', 'class' => 'form-control']) !!}
					<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
					<a href="/post-saya" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
				{!! Form::close() !!}
			</div>
		</div>
		<ul class="list-group">
			@if ($posts->total() == 0)
			<li class="list-group-item text-center">Tidak ada komentar</li>
			@endif
			@foreach ($posts as $f)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/post/{{ $f->post_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-post-{{$f->post_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/post/'.$f->post_id, 'style' => 'display:none;', 'id' => 'delete-post-'.$f->post_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				{{ str_limit(strip_tags($f->description), 250) }}<br>
				@if ($f->forum->group)
				<a href="/forum-category/{{ $f->forum->group_id }}-{{ str_slug($f->forum->group->group_name) }}">
					[{{ $f->forum->group->group_name }}]
				</a>
				@endif
				<a href="{{ $f->forum->url }}">{{ str_limit($f->forum->title, 50) }}</a> &bull;
				{{ $f->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
			</div>
			{!! $posts->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop
