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
			<h2>{{ $hadist->judul }}</h2><hr />

			<div style="font-size:35px;" class="text-success">
				{{ $hadist->hadist }}
			</div>
			<hr />

			{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}

			<hr>
			@include('layouts._share')
		</div>

	</div>
	<div class="col-md-3">
		disini nanti ada slider buat hadist
	</div>
</div>



@stop
