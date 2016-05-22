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
		<div class="col-md-3">
			@include('kitab._group')
		</div>
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>
			<div class="row no-gutter">
				@each('kitab._list', $kitabs, 'b')
			</div>

			<nav class="text-center">
				{!! $kitabs->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
