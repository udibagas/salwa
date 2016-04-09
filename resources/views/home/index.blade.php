@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-8">
		@include('home.video')
		@include('home.aktual')
		<div class="row">
			<div class="col-md-6">
				@include('home.tanya')
			</div>
			<div class="col-md-6">
				@include('home.forum')
			</div>
		</div>
		@include('home.kitab')
		@include('home.peduli')
		@include('home.market')
	</div>
	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>

@stop
