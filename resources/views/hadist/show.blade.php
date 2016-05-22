@extends('layouts.main')

@section('title')  {{ $groupName }} : {{ $hadist->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist' => strtoupper($groupName),
			'#' => $hadist->judul,
		]
	])

@stop

@section('content')

<div class="row">

	<div class="col-md-3">
		@include('hadist._group')
	</div>

	<div class="col-md-6">
		<div class="well text-center">
			<h2 class="text-primary">{{ $hadist->judul }}</h2><hr />

			<div style="font-size:30px;" class="text-danger">
				{{ $hadist->hadist }}
			</div>

			<br>

			<div class="alert alert-info">
				{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}
			</div>

		</div>

		<div class="text-center">
			@include('layouts._share')
		</div>

	</div>
	<div class="col-md-3">
		<h4 class="title">TERKAIT</h4>
		<div class="list-group">
			@foreach ($terkait as $t)
			<a class="list-group-item" href="/hadist/{{ $t->hadist_id }}-{{ str_slug($t->judul )}}">
				{{ $t->judul }}
			</a>
			@endforeach
		</div>
	</div>
</div>



@stop
