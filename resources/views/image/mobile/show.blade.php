@extends('layouts.main')

@section('title', 'Salwa Image : '.$image->judul)

@section('content')

<div class="row-post text-center">
	<h3>{{ $image->judul }}</h3><br>
	<img src="/{{ $image->img_images }}" alt="{{ $image->judul }}" class="img-responsive" />
	<br>
	@include('layouts._share')
</div>

<h4 class="title">IMAGE TERKAIT</h4>
<div class="row-post">
	@foreach ($terkait as $image)
		<a href="/informasi/{{ $image->id_salwaimages }}-{{ str_slug($image->judul) }}">
			<img class="img-responsive" src="/{{ $image->img_images }}" alt="{{ $image->judul }}">
		</a>
	@endforeach
</div>

@include('image._group')

@if (auth()->check() && auth()->user()->isAdmin())
	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/image') !!}
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
		<a href="/image/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}
@endif

@stop
