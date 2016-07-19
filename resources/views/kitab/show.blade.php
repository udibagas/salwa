@extends('layouts.main')

@section('title', 'Kitab & Terjemahan : '. $kitab->judul)
@section('image', 'http://www.salamdakwah.com/'.$kitab->img_buku)
@section('description', str_limit(strip_tags($kitab->materi), 250))

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab' => 'KITAB & TERJEMAHAN',
			'#' => $kitab->judul,
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('kitab._group')
		</div>
		<div class="col-md-6">
			<div class="media">
				<div class="media-left">
					<img class="media-object" src="/{{ $kitab->img_buku }}" alt="" style="width:200px;">
				</div>
				<div class="media-body">
					<h3 class="media-heading">{{ $kitab->judul }}</h3>
					<b>{{ $kitab->penulis }}</b>
					<br />

					<p>{!! $kitab->materi !!}</p>

				</div>

				<hr>

				@include('layouts._share')

				<a href="/kitab/{{ $kitab->buku_id }}/download" class="btn btn-info"><span class="fa fa-download"></span> Download</a>

			</div>

			<hr>

		</div>
		<div class="col-md-3">
			<h4 class="title">KITAB TERKAIT</h4>
			@each('kitab._list-side', $terkait, 'b')
		</div>
	</div>

@stop
