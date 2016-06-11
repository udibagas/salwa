@extends('layouts.cms')

@section('title', 'Comments')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/comment' => 'COMMENTS'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-comments"></i> COMMENTS</h4>
	<a href="/comment/approve-all" class="delete btn btn-info"><i class="fa fa-check"></i> Approve All Comment</a>
	<br>
	<br>

	@each('comment._list', $comments, 'c')

	<div class="text-center">
		{!! $comments->appends(['title' => request('title'),'user' => request('user'),'type' => request('type'),'approved' => request('approved')])->links() !!}
	</div>

@endsection
