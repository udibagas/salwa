@extends('layouts.cms')

@section('title', 'Forum Post')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/post' => 'FORUM POST'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments"></i> FORUM POST : {{ $forum ? $forum->title : 'ALL' }}</h3>
		</div>
		<div class="panel-body">
			<div class="pull-right">
				{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
					{!! Form::text('q', request('q'), ['placeholder' => 'Search', 'class' => 'form-control']) !!}
					{!! Form::hidden('forum_id', request('forum_id')) !!}
					<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
					<a href="/post?forum_id={{ request('forum_id') }}" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
				{!! Form::close() !!}
			</div>
		</div>
		<ul class="list-group">
			@foreach($posts as $p)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-post-{{$p->post_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/post/'.$p->post_id, 'style' => 'display:none;', 'id' => 'delete-post-'.$p->post_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				{!! $p->description !!}
				<br>
				<strong>
					{{ $p->user->name }} &bull;
					{{ $p->created->diffForHumans() }}
					@if (!$forum)
					&bull; <a href="/post?forum_id={{ $p->forum_id }}">{{ str_limit($p->forum->title, 75) }}</a>
					@endif
				</strong>
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} entries
			</div>
			{!! $posts->appends(['forum_id' => request('forum_id'),'description' => request('description'),'user' => request('user')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>



@stop
