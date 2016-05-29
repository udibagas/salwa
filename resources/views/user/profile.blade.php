@extends('layouts.main')

@section('title', 'Profile : '.$user->name)

@push('css')
	<link href="/DataTables/datatables.min.css" rel="stylesheet">
@endpush


@push('script')
	<script src="/DataTables/datatables.min.js"></script>
	<script type="text/javascript">
		$('table').dataTable();
	</script>
@endpush

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'USER PROFILE',
			'' => $user->name
		]
	])

@stop

@section('content')

@if (session('error'))
	<div class="alert alert-danger text-center">
		<strong>{{ session('error') }}</strong>
	</div>
@endif

@if (session('success'))
	<div class="alert alert-success text-center">
		<strong>{{ session('success') }}</strong>
	</div>
@endif

<div class="row">

	<div class="col-md-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">PROFILE</a></li>
			<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">PERTANYAAN</a></li>
			<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">FORUM</a></li>
			<!-- <li role="presentation"><a href="#4" aria-controls="4" role="tab" data-toggle="tab">DISKUSI</a></li> -->
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">

			<div role="tabpanel" class="tab-pane active" id="1">
				<br />
				@include('user._form', ['url' => '/user/'.$user->user_id, 'method' => 'PUT'])
			</div>

			<div role="tabpanel" class="tab-pane" id="2">
				<br />
				@include('user._pertanyaan', ['pertanyaans' => $user->pertanyaans])
			</div>

			<div role="tabpanel" class="tab-pane" id="3">
				<br />
				@include('user._forum', ['forums' => $user->forums])
			</div>

			<!-- <div role="tabpanel" class="tab-pane" id="4">
				<br />
				include('user._post', ['posts' => $user->posts])
			</div> -->

		</div>
	</div>

</div>

@stop
