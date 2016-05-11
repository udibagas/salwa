@extends('layouts.main')

@section('title') Profile : {{ $user->name }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'USER PROFILE',
			'' => $user->name
		]
	])

@stop

@section('content')

<div class="row">

	<div class="col-md-9">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">PROFILE</a></li>
			<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">PERTANYAAN SAYA</a></li>
			<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">FORUM SAYA</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">

			<div role="tabpanel" class="tab-pane active" id="1">
				<br />
				@include('user._profile')
			</div>

			<div role="tabpanel" class="tab-pane" id="2">
				<br />
				@include('user._pertanyaan', ['pertanyaans' => $user->pertanyaans])
			</div>

			<div role="tabpanel" class="tab-pane" id="3">
				<br />
				@include('user._forum', ['forums' => $user->forums])
			</div>

		</div>
	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>

@stop
