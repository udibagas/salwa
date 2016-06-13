@extends('layouts.main')

@section('title') Home @stop

@section('content')

	@include('layouts.menu')
	@include('home.mobile._artikel')
	@include('home.mobile._video')
	@include('home.mobile._pertanyaan')
	@each('home.mobile._forum', $forumKategori, 'group')
	@include('home.mobile._peduli')
	@include('home.mobile._informasi')

@stop

@push('script')
<script type="text/javascript">

	$(document).ready(function () {
	  $('#menu').sidr({
		timing: 'ease-in-out',
		speed: 500
	  });
	});

	$( window ).resize(function () {
	  $.sidr('close', 'sidr');
	});

</script>
@endpush
