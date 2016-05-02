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

			<a href="/forum-category/{{ $group->group_id }}-{{ str_slug($group->group_name) }}"><img src="http://www.salamdakwah.com/{{ $group->img_group }}" style="height:100px;float:left;margin:0 10px 10px 0;" alt="" /></a>

			<h3>{{ $group->description }}</h3>
			<div class="clearfix"></div>

			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th> Title </th>
						<th> User </th>
						<th style="width:180px;"> Last Update </th>
						<th> Post(s) </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($forums as $f)
					<tr>
						<td> <b><a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">{{ $f->title }}</a></b> </td>
						<td> <b>{{ $f->user ? $f->user->name : '' }}</b> </td>
						<td> {{ $f->updated->diffForHumans() }} </td>
						<td class="text-right"><span class="badge">{{ $f->posts()->count() }}</span></td>
					</tr>
					@endforeach
				</tbody>
			</table>

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
