@extends('layouts.main')

@section('title', 'Quran')

@section('content')

	@include('quran.mobile._search-form')

	<div id="post-list" style="margin-top:55px;">
		<img src="/quran_image/{{ sprintf("%03d", $page) }}.jpg" class="img-responsive" alt="" />
	</div>

	<div class="text-center text-bold">
		<br /><img src="/images/loading.png" alt="" class="loading hidden" />
		<a href="{{ $nextPageUrl }}" class="next-page">LOAD MORE</a><br><br>
	</div>

	@include('quran._surah')

@stop

@push('script')

<script type="text/javascript">
	var url = '{{ $nextPageUrl }}';
</script>

@endpush
