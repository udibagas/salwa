@extends('layouts.main')

@section('title', 'Kitab & Terjemahan')

@section('content')

	<h4 class="title">KITAB & TERJEMAHAN</h4>
	<div id="post-list">
		@each('kitab.mobile._list', $kitabs, 'a')
	</div>

	@if ($kitabs->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $kitabs->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('kitab._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/kitab/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $kitabs->nextPageUrl() }}';
</script>

@endpush
