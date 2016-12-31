@extends('layouts.cms')

@section('title', 'Comments')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'COMMENTS',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> COMMENTS</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
				<div class="pull-right">
					{!! Form::text('q', request('q'), ['placeholder' => 'Search Comment', 'class' => 'form-control']) !!}
					<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
					<a href="/comment" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
				</div>
			{!! Form::close() !!}

			<a href="/comment/approve-all" class="confirm btn btn-primary"><i class="fa fa-check"></i> APPROVE ALL COMMENT</a>
		</div>
		<ul class="list-group">
			@foreach ($comments as $f)
			<li class="list-group-item @if ($f->approved == 0) disabled @endif">
				<div class="pull-right">
					@if ($f->approved == 0)
					<a href="/comment/{{ $f->id }}/approve">Approve</a> &bull;
					@else
					<a href="/comment/{{ $f->id }}/unapprove">Unapprove</a> &bull;
					@endif
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-comment-{{$f->id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/comment/'.$f->id, 'style' => 'display:none;', 'id' => 'delete-comment-'.$f->id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				<h4>{{ $f->title }}</h4>
				{!! $f->content !!}
				{{ $f->user->name }} &bull;
				<a href="/{{ $f->commentable_type }}">[{{ ucfirst($f->commentable_type) }}]</a>
				<a href="{{ $f->commentable->url }}">{{ $f->commentable->title }}</a> &bull;
				{{ $f->created_at->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of {{ $comments->total() }} entries
			</div>
			{!! $comments->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop
