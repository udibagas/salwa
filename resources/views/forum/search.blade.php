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

		<div class="col-md-3">
			@include('forum._group')
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-search"></i> HASIL PENCARIAN "{{ request('search') }}"</h4>

			<ul class="list-group">
				@if (count($forums) == 0)
					<li class="list-group-item">
						<strong>Belum ada post</strong>
					</li>
				@endif

				@foreach ($forums as $f)
					<li class="list-group-item">
						<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
							<strong>{{ $f->title }} </strong>
						</a><br>
						<i class="fa fa-user"></i> {{ $f->user ? $f->user->name : '' }}
						<i class="fa fa-clock-o"></i> {{ $f->updated->diffForHumans() }}
					</li>
				@endforeach
			</ul>

			<nav class="text-center">
				{!! $forums->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>

		<!-- <div class="col-md-3">
			include('home.sidebar')
		</div> -->

	</div>

@stop
