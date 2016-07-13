@extends('layouts.main')

@section('title', 'Quran')

@section('content')

	@include('quran.mobile._search-form')

	<div id="post-list" style="margin-top:55px;">
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
	if (q.length > 0) {
		$('#post-list .terjemahan').each(function(index, element) {
			text = $(this).html().replace(RegExp(q, "gi"),'<b><i>'+q+'</i></b>');
			$(this).html(text);
		});
	}
	var url = '{{ $ayats->nextPageUrl() }}';
</script>

@endpush
