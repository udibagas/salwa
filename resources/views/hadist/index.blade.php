@extends('layouts.main')

@section('title') {{ $groupName }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => strtoupper($groupName),
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-8">
			<h1 class="title">{{ strtoupper($groupName) }}</h1>
			@foreach ($hadists as $h)
				<div class="alert alert-info">
					<a href="/hadist/{{ $h->hadist_id }}-{{ str_slug($h->judul) }}"><h3>{{ $h->judul }}</h3></a>
					<hr>
					<div class="text-right" style="font-size:30px;">
						{{ $h->hadist }}
					</div>
					<br />
					<em>{!! $h->penjelasan !!}</em>
				</div>
			@endforeach

			<hr>
			<nav class="text-center">
				{!! $hadists->links() !!}
			</nav>

		</div>
		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
