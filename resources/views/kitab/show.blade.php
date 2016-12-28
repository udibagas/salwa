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
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('kitab._group')
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
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

						<a href="/kitab/{{ $kitab->buku_id }}/download" class="btn btn-default"><span class="fa fa-download"></span> Download</a>

					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">KITAB TERKAIT</h3>
				</div>
				<div class="panel-body">
					@each('kitab._list-side', $terkait, 'b')
				</div>
			</div>
		</div>
	</div>

@stop
