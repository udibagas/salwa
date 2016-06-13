@extends('layouts.main')

@section('title', 'Audio : {{ $audio->judul }}')

@section('content')

<div class="row-post">
	<h3>{{ $audio->judul }}</h3>
	<small>{{ $audio->updated->diffForHumans() }}</small>
	<br><br>

	<audio controls="controls" preload="none" autoplay="autoplay" style="width:100%;"><source src="/{{ $audio->file_mp3 }}" type="application/ogg"></source></audio>

	<br><br>
	{!! $audio->keterangan !!}

	<br><br>

	<a href="/audio/{{ $audio->mp3_download_id }}/download" class="btn btn-info"><i class="fa fa-download"></i> Download</a>

	<hr>
	@include('layouts._share')

</div>

@include('comment.mobile.index', [
'comments' => $audio->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
])

@if (auth()->check())
	@include('comment.mobile.form', [
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

<h4 class="title">AUDIO TERKAIT</h4>
@each('audio.mobile._list', $terkait, 'a')
@include('audio._group')

@stop
