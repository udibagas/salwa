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
	<div class="col-md-3">
		@include('audio._group')
	</div>
	<div class="col-md-6">
		<h1>{{ $audio->judul }}</h1>
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
		'comments' => $audio->comments()->ofType('audio')
					->when(! auth()->user()->isAdmin(), function($query) {
						return $query->approved();
					})->get()
		])

		@if (auth()->check())
			@include('comment.form', ['post_id' => $audio->mp3_download_id, 'type' => 'audio'])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

	</div>
	<div class="col-md-3">
		<h4 class="title">AUDIO TERKAIT</h4>
		<div class="list-group">
			@foreach ($terkait as $t)
			<a class="list-group-item @if ($t->mp3_download_id == $audio->mp3_download_id) active @endif" href="/audio/{{ $t->mp3_download_id }}-{{ str_slug($t->judul) }}">{{ $t->judul }}</a>
			@endforeach
		</div>
	</div>
</div>



@stop
