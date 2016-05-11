@extends('layouts.main')

@section('title') Kitab & Terjemahan @stop

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
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
			<div class="media">
				<div class="media-left">
					<img class="media-object" src="http://www.salamdakwah.com/{{ $kitab->img_buku }}" alt="..." style="width:200px;">
				</div>
				<div class="media-body">
					<h3 class="media-heading">{{ $kitab->judul }}</h3>
					<b>{{ $kitab->penulis }}</b>
					<br />

					<p>{!! $kitab->materi !!}</p>

				</div>

				<hr>

				@include('layouts._share', ['url' => url('/kitab/'.$kitab->buku_id.'-'.str_slug($kitab->judul))])

				<a href="http://www.salamdakwah.com/{{ $kitab->file_pdf }}" class="btn btn-info"><span class="fa fa-download"></span> Download ({{ $kitab->didownload }}x)</a>

			</div>

		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
