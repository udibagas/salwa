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
		<div class="col-sm-3 hidden-xs">
			@include('audio._group')
		</div>

		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-music"></i> SALWA AUDIO</h3>
				</div>
				<table class="table table-hover table-striped">
					<tbody>
						<?php $i = $audios->firstItem(); ?>
						@foreach ($audios as $m)
						<tr>
							<td>{{ $i++ }}</td>
							<td><strong><a href="/audio/{{ $m->mp3_download_id }}-{{ str_slug($m->judul) }}">{{ $m->judul }}</a></strong></td>
							<td>
								<audio controls="controls" preload="none"><source src="/{{ $m->file_mp3 }}" type="application/ogg"></source></audio>
							</td>
							<td class="text-right">
								<a href="/audio/{{ $m->mp3_download_id }}/download" class="btn btn-default"><span class="fa fa-download"></span> Download</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<nav class="text-center">
				{!! $audios->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>
		</div>
	</div>

@stop
