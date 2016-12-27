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

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-plus"></i> BUAT THREAD FORUM BARU</h3>
			</div>
			<div class="panel-body">
				@include('forum._form', ['method' => 'POST', 'url' => '/forum'])
			</div>
		</div>
	</div>
	<div class="col-sm-4 col-md-4">
		@include('forum._panduan')
	</div>
</div>

@endsection
