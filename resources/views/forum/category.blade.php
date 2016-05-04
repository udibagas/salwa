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

		<div class="col-md-2">
			@include('forum.list-category');
		</div>

		<div class="col-md-7">

			<h4 class="title"><i class="fa fa-hashtag"></i> {{ $group->group_name }}</h4>

			<a href="/forum-category/{{ $group->group_id }}-{{ str_slug($group->group_name) }}"><img src="http://www.salamdakwah.com/{{ $group->img_group }}" style="height:100px;float:left;margin:0 10px 10px 0;" alt="" /></a>

			<strong>{{ $group->description }}</strong>
			<hr>
			<a href="/forum/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>

			<div class="clearfix"></div><br>

			<div class="" style="padding:10px 20px;border:1px solid #8EC7FB;">
				@foreach ($forums as $f)
					<div class="underlined">
						<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
							<h4><i class="fa fa-comments-o"></i>  {{ $f->title }} </h4>
						</a>
						<b>{{ $f->user ? $f->user->name : '' }} | {{ $f->updated->diffForHumans() }} | {{ $f->posts->count() }} post(s)</b>
					</div>
				@endforeach
			</div>

			<nav class="text-center">
				{!! $forums->links() !!}
			</nav>

		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>

	</div>

@stop
