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
		<div class="col-sm-12">

			@foreach ($banners as $p)
				@if ($pos = $p->positions()->first())
				<p><a href="{{ $pos->pivot->url }}" target="_blank"><img src="/{{ $pos->pivot->img_banner }}" alt="{{ $p->name }}" class="img-responsive" style="max-width:100%" /></a></p>
				@endif
			@endforeach

			<nav class="text-center">
				{!! $banners->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
