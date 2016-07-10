@extends('layouts.main')

@section('title') Search : {{ request('q') }} @stop

@section('content')
	<div class="row-post" style="height:55px;position:fixed;top:50px;left:10px;right:10px;background-color:#D9EDF7;z-index:998;">
		{!! Form::open(['method' => 'GET', 'url' => '/search']) !!}
		{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
		{!! Form::close() !!}
	</div>

	<div id="post-list" style="margin-top:55px;">
		<div class="row-post text-center">
			<h4>{{ $posts->total() }} results for {{ request('q') }}</h4>
		</div>
		@each('search.mobile._item', $posts, 'p')
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
		text = $(this).html().replace(RegExp(q, "gi"),'<b><i>'+q+'</i></b>');
		$(this).html(text);
	});

	var url = '{{ $posts->nextPageUrl() }}';

</script>

@endpush
