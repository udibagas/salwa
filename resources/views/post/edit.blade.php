@extends('layouts.main')

@section('title') Edit Komentar @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'EDIT KOMENTAR',
		]
	])

@stop

@section('content')

	<div class="row">
		<div class="col-md-3">
			@include('forum.list-category', [
				'group' => $post->forum->group,
				'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get()
			])
		</div>
		<div class="col-md-9">
			<h4 class="title">EDIT KOMENTAR</h4><hr>
			include('post._form', ['url' => '/post/'.$model->id, 'method' => 'PATCH'])
		</div>
	</div>



@endsection
