@extends('layouts.main')

@section('title', 'Salwa Image : '.$image->judul)

@section('content')

<div class="row-post text-center">
	<h3>{{ $image->judul }}</h3>
	<img src="/{{ $image->img_images }}" alt="{{ $image->judul }}" class="img-responsive" />
	<br>
	@include('layouts._share')
</div>

@include('image._group')

@stop
