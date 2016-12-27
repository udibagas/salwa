@extends('layouts.main')

@section('title') Audio : {{ $audio->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/audio' => 'AUDIO',
			'#' => $audio->judul
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-sm-3 col-md-3 hidden-xs">
		@include('audio._group')
	</div>
	<div class="col-sm-6 col-md-6">
		<h2>{{ $audio->judul }}</h2>
		<i class="fa fa-clock-o"></i> {{ $audio->updated->diffForHumans() }}
		<hr>

		<audio controls="controls" preload="none" autoplay="autoplay"><source src="/{{ $audio->file_mp3 }}" type="application/ogg"></source></audio>

		<br><br>
		{!! $audio->keterangan !!}

		<hr>
		@include('layouts._share')
		<a href="/audio/{{ $audio->mp3_download_id }}/download" class="btn btn-info"><i class="fa fa-download"></i> Download</a>

		<hr>

		@include('comment.index', [
		'comments' => $audio->comments()
					->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $audio->mp3_download_id,
					'commentable_type' => 'audio'
				])
			])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

	</div>
	<div class="col-sm-3 col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">AUDIO TERKAIT</h3>
			</div>
			<div class="list-group">
				@foreach ($terkait as $t)
				<a class="list-group-item @if ($t->mp3_download_id == $audio->mp3_download_id) active @endif" href="/audio/{{ $t->mp3_download_id }}-{{ str_slug($t->judul) }}">{{ $t->judul }}</a>
				@endforeach
			</div>
		</div>
	</div>
</div>



@stop
