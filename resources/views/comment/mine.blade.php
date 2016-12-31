@extends('layouts.user')

@section('title', 'komentar Saya')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'KOMENTAR SAYA',
		]
	])

@stop

@section('user-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments-o"></i> KOMENTAR SAYA</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
				<div class="pull-right">
					{!! Form::text('q', request('q'), ['placeholder' => 'Search Post', 'class' => 'form-control']) !!}
					<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
					<a href="/komentar-saya" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
				</div>
			{!! Form::close() !!}

			<a href="/comment/hapus-semua-comment-saya" class="btn btn-primary confirm">
				<i class="fa fa-trash"></i> Hapus semua komentar yang tidak disetujui
			</a>
		</div>
		<ul class="list-group">
			@foreach ($comments as $f)
			<li class="list-group-item @if ($f->approved == 0) disabled @endif">
				<div class="pull-right">
					@if ($f->approved == 0)
					<a href="/comment/{{ $f->id }}/edit">Edit</a> &bull;
					@endif
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-comment-{{$f->id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/comment/'.$f->id, 'style' => 'display:none;', 'id' => 'delete-comment-'.$f->id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				<h4>{{ $f->title }}</h4>
				{!! $f->content !!}
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
