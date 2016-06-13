@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-2">
			<!-- <a href="#sidr" id="menu"><i class="fa fa-list"></i></a> -->
			<div id="sidr">
				@include('layouts.adminnav')
			</div>
		</div>

		<div class="col-md-10">
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

@push('script')
<script type="text/javascript">

	// $(document).ready(function () {
	//   $('#menu').sidr({
	// 	timing: 'ease-in-out',
	// 	speed: 500
	//   });
	// });
	//
	// $( window ).resize(function () {
	//   $.sidr('close', 'sidr');
	// });

</script>
@endpush
