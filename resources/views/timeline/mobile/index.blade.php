@extends('timeline.mobile.layout')

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
