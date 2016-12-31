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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-comments"></i> COMMENTS</h3>
		</div>
		<div class="panel-body">
			<a href="/comment/approve-all" class="delete btn btn-primary"><i class="fa fa-check"></i> APPROVE ALL COMMENT</a>
			<hr>
			@each('comment._list', $comments, 'c')
		</div>
		<div class="panel-footer">
			{!! $comments->appends(['title' => request('title'),'user' => request('user'),'type' => request('type'),'approved' => request('approved')])->links() !!}
		</div>
	</div>

@endsection
