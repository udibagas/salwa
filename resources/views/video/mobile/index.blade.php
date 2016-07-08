@extends('layouts.main')

@section('title', 'Salwa Video')

@section('content')

	<h4 class="title">SALWA VIDEO</h4>
	<div id="post-list">
		@each('video.mobile._list', $videos, 'a')
	</div>

	@if ($videos->lastPage() > 1)
		<div class="text-center text-bold">
			<img src="/images/loading.png" alt="" class="loading hidden" /><br>
			<a href="{{ $videos->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('video._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/video/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $videos->nextPageUrl() }}';
</script>

@endpush
