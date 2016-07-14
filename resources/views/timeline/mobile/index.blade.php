@extends('timeline.mobile.layout')

@section('title', 'Timeline')

@section('content')

	<div id="post-list">
		@each('timeline.mobile._item', $posts, 'p')
	</div>

	@if ($posts->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $posts->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif
@stop


@push('script')
	<script type="text/javascript">

		$('#post-list h4, #post-list p').each(function(index, element) {
			text = $(this).html().replace(RegExp(q, "gi"),'<b>'+q+'</b>');
			$(this).html(text);
		});

		var url = '{{ $posts->nextPageUrl() }}';

	</script>
@endpush
