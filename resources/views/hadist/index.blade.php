@extends('layouts.main')

@section('title', 'Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'HADIST, DZIKIR & DO\'A',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('hadist._group')
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-list-alt"></i> HADIST, DZIKIR & DO'A</h3>
				</div>
				<ul class="list-group">
					@each('hadist._list', $hadists, 'a')
				</ul>
			</div>

			<nav class="text-center">
				{!! $hadists->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
		<div class="col-sm-3 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<h3>{{ $hadist->judul }}</h3>
				</div>
				<div class="panel-body">

					<div style="font-size:20px;" class="arab">
						{{ $hadist->hadist }}
					</div>

					<br>

					{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}

				</div>
			</div>
		</div>
	</div>

@stop
