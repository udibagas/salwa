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

	<div class="col-sm-3 hidden-xs">
		@include('hadist._group')
	</div>

	<div class="col-sm-6">
		<div class="panel panel-default text-center">
			<div class="panel-heading">
				<h2>{{ $hadist->judul }}</h2>
			</div>
			<div class="panel-body">
				<div style="font-size:30px;" class="arab">
					{{ $hadist->hadist }}
				</div> <br>

				<hr style="border-top:1px dashed #999">

					{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}
				<hr style="border-top:1px dashed #999">

				<div class="text-center">
					@include('layouts._share')
				</div>
			</div>
		</div>

	</div>
	<div class="col-sm-3 hidden-xs">
		<hadist limit="10" group="{{ $url }}" header="TERKAIT"></hadist>
	</div>
</div>



@stop
