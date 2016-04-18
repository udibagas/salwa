@extends('layouts.admin')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/admin" class="btn btn-warning"><i class="fa fa-dashboard"></i></a>
			<a href="/post" class="btn btn-warning">Post</a>
			<a href="/post/create" class="btn btn-warning">Create Post</a>
		</div>
	</div>

@stop

@section('content')

	<h1>CREATE POST</h1><hr>

	@include('post._form', ['url' => 'post', 'method' => 'POST'])

@endsection
