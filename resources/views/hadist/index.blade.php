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
		<div class="col-md-2">
			@include('hadist._hashtag')
		</div>
		<div class="col-md-7">
			<h4 class="title">{{ strtoupper($groupName) }}</h4>
				@foreach ($hadists as $h)
					<div class="alert alert-info">
						<a href="/hadist/{{ $h->hadist_id }}-{{ str_slug($h->judul) }}"><h3>{{ $h->judul }}</h3></a>
						<br>
						<div class="text-right" style="font-size:30px;">
							{{ $h->hadist }}
						</div>
						<br />

						{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $h->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}

					</div>
				@endforeach

			<nav class="text-center">
				{!! $hadists->links() !!}
			</nav>

		</div>
		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop
