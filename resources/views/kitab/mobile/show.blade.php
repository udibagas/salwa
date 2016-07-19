@extends('layouts.main')

@section('title', 'Kitab & Terjemahan : '. $kitab->judul)
@section('image', 'http://www.salamdakwah.com/'.$kitab->img_buku)
@section('description', str_limit(strip_tags($kitab->materi), 250))

@section('content')

	<h4 class="title">KITAB & TERJEMAHAN</h4>
	<div class="row-post">
		<div class="media">
			<div class="media-left">
				<div class="thumbnail" style="width:100px;height:150px;">
					<img class="media-object cover no-round" src="/{{ $kitab->img_buku }}" alt="" style="width:200px;">
				</div>
			</div>
			<div class="media-body">
				<strong>{{ $kitab->judul }}</strong>
				<br>
				<small>{{ $kitab->penulis }}</small>
				<br />

				<p>{!! $kitab->materi !!}</p>

				<a href="/kitab/{{ $kitab->buku_id }}/download" class="btn btn-info"><span class="fa fa-download"></span> Download</a>

			</div>
		</div>
	</div>

	<div class="row-post text-center">
		@include('layouts._share')
	</div>

	<h4 class="title">KITAB TERKAIT</h4>
	@each('kitab.mobile._list', $terkait, 'a')
	@include('kitab._group')

	@if (auth()->check() && auth()->user()->isAdmin())
		{!! Form::open(['method' => 'DELETE']) !!}
			{!! Form::hidden('redirect', '/kitab') !!}
			@include('layouts.delete-btn-mobile')
			@include('layouts.edit-btn-mobile')
			<a href="/kitab/create">@include('layouts.add-btn-mobile')</a>
		{!! Form::close() !!}
	@endif

@stop
