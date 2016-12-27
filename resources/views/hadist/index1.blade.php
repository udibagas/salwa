@extends('layouts.main')

@section('title', 'Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'HADIST',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 col-md-3">
			@include('hadist._group')
		</div>
		<div class="col-md-9">
			<h4 class="title">HADIST</h4>
				@foreach ($hadists as $h)
					<div class="well">
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
				{!! $hadists->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
		<!-- <div class="col-sm-3 col-md-3">
			include('home.sidebar')
		</div> -->
	</div>

@stop
