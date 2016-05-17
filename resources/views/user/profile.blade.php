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

<div class="row">

	<div class="col-md-12">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">PROFILE</a></li>
			<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">PERTANYAAN</a></li>
			<li role="presentation"><a href="#3" aria-controls="3" role="tab" data-toggle="tab">FORUM</a></li>
			<li role="presentation"><a href="#4" aria-controls="4" role="tab" data-toggle="tab">DISKUSI</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">

			<div role="tabpanel" class="tab-pane active" id="1">
				<br />
				<div class="row">
					<div class="col-md-7">
						@include('user._form', ['url' => '/user/'.$user->id, 'method' => 'PUT'])
					</div>
					<div class="col-md-2">
						@if ($user->img_user)
						<img class="img-responsive" src="/{{ $user->img_user }}" />
						@else
						<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
						@endif
					</div>
				</div>
			</div>

			<div role="tabpanel" class="tab-pane" id="2">
				<br />
				@include('user._pertanyaan', ['pertanyaans' => $user->pertanyaans])
			</div>

			<div role="tabpanel" class="tab-pane" id="3">
				<br />
				@include('user._forum', ['forums' => $user->forums])
			</div>

			<div role="tabpanel" class="tab-pane" id="4">
				<br />
				@include('user._post', ['posts' => $user->posts])
			</div>

		</div>
	</div>

</div>

@stop
