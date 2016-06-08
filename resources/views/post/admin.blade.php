@extends('layouts.cms')

@section('title', 'Forum Post')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/post' => 'FORUM POST'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-comments"></i> FORUM POST</h4>

	@each('post._list', $posts, 'p')

	<div class="text-center">
		{!! $posts->appends(['forum_id' => request('forum_id'),'description' => request('description'),'user' => request('user')])->links() !!}
	</div>

@stop