@extends('layouts.main')

@section('title', 'Hadist')

@section('content')

	<h4 class="title">{{ $groupName or "HADIST" }}</h4>

	<div id="post-list">
		@each('hadist.mobile._list', $hadists, 'a')
	</div>

	@if ($hadists->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $hadists->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('hadist._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/hadist/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $hadists->nextPageUrl() }}';
</script>

@endpush
