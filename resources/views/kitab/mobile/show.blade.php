@extends('layouts.main')

@section('title', 'Kitab & Terjemahan : '. $kitab->judul)

@section('content')

	<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
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
	<a href="/kitab/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop
