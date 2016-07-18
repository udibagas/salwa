@extends('timeline.mobile.layout')

@section('content')
	<br>


	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">FORUM</a></li>
		<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">PERTANYAAN</a></li>
	</ul>

	<br>

	<!-- Tab panes -->
	<div class="tab-content">

		<div role="tabpanel" class="tab-pane active" id="1">
			@include('timeline.mobile._form-forum')
		</div>

		<div role="tabpanel" class="tab-pane" id="2">
			@include('timeline.mobile._form-pertanyaan')
		</div>

	</div>

@stop
