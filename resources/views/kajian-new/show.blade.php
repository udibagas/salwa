@extends('layouts.main')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian' => 'KAJIAN'
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('kajian._group')
		</div>
		<div class="col-md-9">
			<h1>{{ $kajian->tema }}</h1>
			<h4>{{ $kajian->ustadz ? $kajian->ustadz->ustadz_name : ''}}</h4>

			{!! $kajian->description !!}

			@if ($kajian->audio)
				<h2>Audio Kajian:</h2>
				<audio controls="controls" preload="none" style=""><source src="{{ $kajian->audio }}" type="application/ogg"></source></audio><br>
				<a href="/kajian/{{ $kajian->id }}/download-audio" class="btn btn-info"><i class="fa fa-download"></i> Download Audio Kajian</a>
			@endif

			@if ($kajian->video)
				<h2>Video Kajian:</h2>
				<iframe width="600" height="300" src="https://www.youtube.com/embed/{{ $kajian->video }}" frameborder="0" allowfullscreen></iframe>
			@endif

			@if ($kajian->transkrip)
				<h2>Transkrip Kajian:</h2>
				{!! $kajian->transkrip !!}
			@endif

			@if ($kajian->fawaid)
				<h2>Fawaid Kajian:</h2>
				{!! $kajian->fawaid !!}
			@endif

			@if ($kajian->file)
				<h2>File Kajian:</h2>
				<a href="/kajian/{{ $kajian->id }}/download-file" class="btn btn-info"><i class="fa fa-download"></i> Download File Kajian</a>
			@endif

		</div>
	</div>

@stop
