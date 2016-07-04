@extends('layouts.main')

@section('title', 'Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'HADIST',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('hadist._group')
		</div>
		<div class="col-md-6">
			<div class="panel panel-blue">
				<div class="panel-heading">
					<h4 class="panel-title"><i class="fa fa-list-alt"></i> HADIST</h4>
				</div>
				<ul class="list-group">
					@each('hadist._list', $hadists, 'a')
				</ul>
			</div>

			<nav class="text-center">
				{!! $hadists->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
		<div class="col-md-3">
			<div class="panel panel-blue">
				<div class="panel-body">
					<h3 class="text-center">{{ $hadist->judul }}</h3><br>

					<div style="font-size:20px;" class="text-right">
						{{ $hadist->hadist }}
					</div>

					<br>

					{!! $hadist->penjelasan !!}

				</div>
			</div>
		</div>
	</div>

@stop
