@extends('layouts.main')

@section('title', 'Quran')

@section('content')

	@include('quran.mobile._search-form')

	<div id="post-list" style="margin-top:66px;">
		<h4 class="title text-center">
			{{ $surah->nama }}/{{ $surah->arab }} ({{ $surah->arti }})<br />
			<small style="color:#fff;">{{ $surah->ayat }} Ayat - {{ $surah->jenis }}</small>
		</h4>
		@each('quran.mobile._ayat', $ayats, 'a')
	</div>

	@if ($ayats->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $ayats->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('quran._surah')

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $ayats->nextPageUrl() }}';
</script>

@endpush
