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
			@yield('cms-content')
		</div>
	</div>
@endsection
