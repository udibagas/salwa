@extends('layouts.main')

@section('title', 'Salwa Audio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA AUDIO'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3">
			@include('audio._group')
		</div>

		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-music"></i> SALWA AUDIO</h4>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>Last Update</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $audios->firstItem(); ?>
					@foreach ($audios as $m)
					<tr>
						<td>{{ $i++ }}</td>
						<td><a href="/audio/{{ $m->mp3_download_id }}-{{ str_slug($m->judul) }}">{{ $m->judul }}</a></td>
						<td>{{ $m->updated->diffForHumans() }}</td>
						<td style="width:200px;">
							<a href="/audio/{{ $m->mp3_download_id }}-{{ str_slug($m->judul) }}" class="btn btn-info"><i class="fa fa-play"></i> Play</a>
							<a href="/{{ $m->file_mp3 }}" class="btn btn-info"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<nav class="text-center">
				{!! $audios->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>

	</div>

@stop

@push('script')

	<script type="text/javascript">

		var audio;

		$(document).on('click', '.fa-play', function() {
			audio = new Audio(this.href);
			audio.play();
			$(this).removeClass('fa-play');
			$(this).addClass('fa-stop');
			$(this).text(' Stop');
			return false;
		});

		$(document).on('click', '.fa-stop', function() {
			// var audio = new Audio(this.href);
			audio.stop();
			$(this).removeClass('fa-stop');
			$(this).addClass('fa-play');
			$(this).text(' Play');
			return false;
		});

	</script>

@endpush
