@extends('layouts.main')

@section('title', 'Forum : Create New Thread')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => 'New Thread',
		]
	])

@stop

@section('content')

	<div class="col-md-offset-2 col-md-8">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Buat Thread Baru</h3>
			</div>
			<div class="panel-body">
				@include('forum._form', ['method' => 'POST', 'url' => '/forum'])
			</div>
		</div>
	</div>
	<div class="clearfix"></div>

@endsection
