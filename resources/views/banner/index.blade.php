@extends('layouts.main')

@section('title', 'Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PROMO',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-12">
			@foreach ($banners as $p)
				@foreach ($p->positions as $a)
				<p><a href="{{ $a->url }}" target="_blank"><img src="/{{ $a->img_banner }}" alt="{{ $p->name }}" class="img-responsive" style="width:100%" /></a></p>
				@endforeach
			@endforeach

			<nav class="text-center">
				{!! $banners->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
