@extends('layouts.main')

@section('title') Kitab & Terjemahan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab' => 'KITAB & TERJEMAHAN'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-8">
			<h1 class="title">KITAB & TERJEMAHAN</h1>
			@foreach ($kitabs as $k)
				<div class="media alert alert-warning">
					<div class="media-left">
						<a href="/kitab/{{ $k->buku_id }}-{{ str_slug($k->judul) }}">
							<img class="media-object" src="http://www.salamdakwah.com/{{ $k->img_buku }}" alt="" style="width:200px;">
						</a>
					</div>
					<div class="media-body">
						<a href="/kitab/{{ $k->buku_id }}-{{ str_slug($k->judul) }}"><h3 class="media-heading">{{ $k->judul }}</h3></a>
						<b>{{ $k->penulis }}</b>
						<br />
						<br />

						<p>{{ $k->keterangan }}</p>

						<a href="http://www.salamdakwah.com/{{ $k->file_pdf }}" class="btn btn-orange"><span class="fa fa-download"></span> Download ({{ $k->didownload }}x)</a>
					</div>
				</div>
			@endforeach

			<hr>
			<nav class="text-center">
				{!! $kitabs->links() !!}
			</nav>

		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
