@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM',
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3 hidden-xs">
			@include('forum._group')
		</div>

		<div class="col-md-9">

			<div class="panel panel-blue">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-search"></i> HASIL PENCARIAN "{{ request('search') }}"</h3>

				</div>
				<ul class="list-group">
					@if (count($forums) == 0)
					<li class="list-group-item text-center">
						<strong>Belum ada post</strong>
					</li>
					@endif

					@each('forum._item', $forums, 'f')
				</ul>
			</div>

			<nav class="text-center">
				{!! $forums->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
	</div>

@stop
