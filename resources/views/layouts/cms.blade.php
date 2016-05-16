@extends('layouts.app')

@push('css')
<style media="screen">
	body {
		font-family: "Nirmala UI", sans-serif;
	}
</style>
@endpush

@section('content')
	<div class="row">
		<div class="col-md-2">
			@include('layouts.adminnav')
		</div>

		<div class="col-md-10">
			@yield('cms-content')
		</div>
	</div>
@endsection
