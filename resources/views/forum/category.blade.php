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

		<div class="col-md-9">
			<h4 class="title">{{ $group->group_name }}</h4>

			<div class="alert alert-info">
				@if ($group->img_group)
				<img src="/{{ $group->img_group }}" style="height:100px;float:left;margin:0 10px 10px 0;" alt="" />
				@endif

				@if ($group->description)
				<p>
					<strong>{{ $group->description }}</strong>
				</p>
				<br>
				@endif


				@if (auth()->check())
				<a href="/forum/create" class="btn btn-info">
					<i class="fa fa-plus-circle"></i> Buat Thread Baru
				</a>
				@endif

				<div class="clearfix"></div>
			</div>

			<ul class="list-group">
				@if (count($forums) == 0)
					<li class="list-group-item text-center">
						<strong>Belum ada post</strong>
					</li>
				@endif

				@each('forum._item', $forums, 'f')
			</ul>

			<nav class="text-center">
				{!! $forums->links() !!}
			</nav>

		</div>
	</div>

@stop
