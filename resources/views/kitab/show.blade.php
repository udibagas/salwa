@extends('layouts.main')

@section('title') Kitab & Terjemahan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab' => 'KITAB & TERJEMAHAN',
			'' => $kitab->judul,
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-8">
			<h1 class="title">{{ $kitab->judul }}</h1>
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

				Share:
				<div class="btn-group">
					<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
					<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
					<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
					<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
					<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
				</div>
				<a href="http://www.salamdakwah.com/{{ $kitab->file_pdf }}" class="btn btn-orange"><span class="fa fa-download"></span> Download ({{ $kitab->didownload }}x)</a>

			</div>

		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
