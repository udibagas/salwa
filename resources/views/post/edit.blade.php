@extends('layouts.admin')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/admin" class="btn btn-warning"><i class="fa fa-dashboard"></i></a>
			<a href="/post" class="btn btn-warning">Post</a>
			<a href="/post/{{$model->id}}/edit" class="btn btn-warning">Edit Post : {{$model->judul}}</a>
		</div>
	</div>

@stop

@section('content')

	<h1>EDIT POST : {{$model->judul}}</h1><hr>

	@include('post._form', ['url' => '/post/'.$model->id, 'method' => 'PATCH'])

@endsection
