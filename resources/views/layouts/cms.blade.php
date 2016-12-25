@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-2">
			<div id="sidr">
				@include('layouts.adminnav')
			</div>
		</div>

		<div class="col-sm-10">
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

			@yield('cms-content')
		</div>
	</div>
@endsection
