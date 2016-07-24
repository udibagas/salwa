@extends('layouts.main')

@section('title', 'Informasi : {{ $informasi->judul }}')
@section('image', $informasi->img)
@section('imageSquare', $informasi->imgSquare)
@section('description', str_limit(strip_tags($informasi->content), 250))

@section('content')

<div class="row-post">
	<h3>{{ $informasi->judul }}</h3>
	<small>
		{{ $informasi->group ? $informasi->group->group_name.' | ' : '' }} {{ $informasi->created->diffForHumans() }}
	</small>

	<br>
	<br>

	<img class="img-responsive" src="/{{ $informasi->img }}" alt="{{ $informasi->judul }}">

	<br>

	{!! $informasi->content !!}

	@if ($dokumens)
	<div class="list-group">
		@foreach ($dokumens as $d)
		<a class="list-group-item" href="/{{ $d->file_upload }}" target="_blank">
			<i class="fa fa-download"></i>
			{{ str_replace('uploads/dirfile_upload/', '' ,$d->file_upload) }}
		</a>
		@endforeach
	</div>
	@endif
</div>

@if (count($images))
<div class="row-post no-gutter">
	@each('informasi._images', $images, 'image')
	<div class="clearfix"></div>
</div>
@endif

<div class="row-post text-center">
	@include('layouts._share')
</div>

@include('comment.mobile.index', [
'comments' => $informasi->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
])

@if (auth()->check())
	@include('comment.mobile.form', [
		'url' => '/comment', 'method' => 'POST',
		'comment' => new \App\Comment([
			'commentable_id' => $informasi->informasi_id,
			'commentable_type' => 'informasi'
		])
	])
@else
	<div class="alert alert-danger text-center">
		<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
	</div>
@endif

<h4 class="title">INFORMASI TERKAIT</h4>
@each('informasi.mobile._list', $terkait, 'a')

@include('informasi._group')

@if (auth()->check() && auth()->user()->isAdmin())
	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/informasi') !!}
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
		<a href="/informasi/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}
@endif

@stop
