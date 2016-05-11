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
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
			<div class="row no-gutter">
				@foreach ($kitabs as $b)
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="/kitab/{{ $b->buku_id }}-{{ str_slug($b->judul) }}">
							<img src="http://www.salamdakwah.com/{{ $b->img_buku }}" class="img-responsive" style="width:100%;height:350px;">
						</a>
					</div>
				</div>
				@endforeach
			</div>

			<nav class="text-center">
				{!! $kitabs->links() !!}
			</nav>

		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
