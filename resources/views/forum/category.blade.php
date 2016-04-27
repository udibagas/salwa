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
		<div class="col-md-8">

			<h1 class="title">{{ $group->group_name }}</h1>

			<a href="/forum-category/{{ $group->group_id }}-{{ str_slug($group->group_name) }}"><img src="http://www.salamdakwah.com/{{ $group->img_group }}" style="height:80px;float:left:margin-right:10px;" alt="" /></a>

			<h3>{{ $group->description }}</h3><hr>

			@foreach ($forums as $f)
				<h3><a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">{{ $f->title }}</a></h3>
				<b>{{ $f->user ? $f->user->name : '' }} | {{ $f->updated->diffForHumans() }}</b>
				<div class="badge pull-right">
					{{ $f->posts()->count() }} posts
				</div>
				<hr style="border-style:dashed">
			@endforeach

			<hr>
			<nav class="text-center">
				{!! $forums->links() !!}
			</nav>

		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
