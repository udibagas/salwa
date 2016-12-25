@extends('layouts.main')

@section('title') Murottal @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal' => 'MUROTTAL'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 hidden-xs">
			@include('murottal._group')
		</div>
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-microphone"></i> MUROTTAL QURAN</h3>
				</div>
				<table class="table table-hover table-striped">
					<tbody>
						<?php $i = $murottals->firstItem(); ?>
						@foreach ($murottals as $m)
						<tr>
							<td>{{ $i++ }}</td>
							<td><strong>{{ $m->nama_surat }}</strong></td>
							<td>
								<audio controls="controls" preload="none"><source src="/{{ $m->file_mp3 }}" type="application/ogg"></source></audio>
							</td>
							<td class="text-right">
								<a href="/murottal/{{ $m->murotal_id }}/download" class="btn btn-default"><span class="fa fa-download"></span> Download</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			<nav class="text-center">
				{!! $murottals->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
