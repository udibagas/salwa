@extends('layouts.main')

@section('title') Kitab & Terjemahan @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab' => 'KITAB & TERJEMAHAN'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-sm-3 col-md-3 hidden-xs">
			@include('kitab._group')
		</div>
		<div class="col-md-9">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h3>
				</div>
				<div class="panel-body">
					<div class="row no-gutter">
						@each('kitab._list', $kitabs, 'b')
					</div>
				</div>
			</div>

			<nav class="text-center">
				{!! $kitabs->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
