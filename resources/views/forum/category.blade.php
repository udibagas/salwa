@extends('layouts.main')

@section('title') Forum : {{ $group->group_name }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => $group->group_name,
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3 hidden-xs">
			@include('forum._group')
		</div>

		<div class="col-md-6">
			<div class="panel panel-blue">
				<div class="panel-heading">
					<h4 class="panel-title">{{ strtoupper($group->group_name) }}</h4>
				</div>
				<div class="panel-body">
					<div class="media">
						<div class="media-left">
							@if ($group->img_group)
							<img src="/{{ $group->img_group }}" class="cover media-object" />
							@endif
						</div>
						<div class="media-body">
							@if ($group->description)
							<p>
								<strong>{{ $group->description }}</strong>
							</p>
							@endif
						</div>
					</div>
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
				{!! $forums->links() !!}
			</nav>

		</div>

		<div class="col-md-3">
			@include('forum._panduan')
		</div>
	</div>

@stop
