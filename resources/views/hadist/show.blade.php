@extends('layouts.main')

@section('title')  {{ $groupName }} : {{ $hadist->judul }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/'.$url => strtoupper($groupName),
			'#' => $hadist->judul,
		]
	])

@stop

@section('content')

<div class="row">

	<div class="col-md-3">
		@include('hadist._group')
	</div>

	<div class="col-md-9">
		<h1>{{ $hadist->judul }}</h1><hr />

		<div class="text-right" style="font-size:30px;">
			{{ $hadist->hadist }}
		</div>
		<br />

		{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}

		<hr>
		@include('layouts._share')

	</div>
</div>



@stop
