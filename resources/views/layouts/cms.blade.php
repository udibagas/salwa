@extends('layouts.app')

@push('script')

<script type="text/javascript">
	$('.delete').click(function() {
		return confirm('Anda yakin?');
	});
</script>

@endpush

@section('content')
	<div class="row">
		<div class="col-md-2">
			@include('layouts.adminnav')
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
