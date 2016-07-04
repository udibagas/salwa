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

	<div class="col-md-3 hidden-xs">
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
				{!! $hadist->penjelasan !!}
				<!-- {!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!} -->
			</div>

		</div>

		<div class="text-center">
			@include('layouts._share')
		</div>

	</div>
	<div class="col-md-3 hidden-xs">
		<div class="panel panel-blue">
			<div class="panel-heading">
				<h4 class="panel-title">HADIST TERKAIT</h4>
			</div>
			<ul class="list-group">
				@foreach ($terkait as $a)
				<li class="list-group-item">
					<div class="media">
						<div class="media-left media-middle">
							<div class="" style="height:30px;width:30px;">
								<img class="media-object profile img-circle cover" alt="{{ $a->judul }}" data-name="{{ $a->judul }}">
							</div>
						</div>
						<div class="media-body">
							<strong>
								<a href="/hadist/{{ $a->hadist_id }}-{{ $a->kd_judul }}">{{ $a->judul }}</a>
							</strong>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>



@stop
