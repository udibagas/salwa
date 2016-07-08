@extends('layouts.main')

@section('title', 'Forum')

@section('content')

	<h4 class="title">HASIL PENCARIAN "{{ request('search') }}"</h4>
	<div id="post-list">
		@each('forum.mobile._list', $forums, 'a')
	</div>

	@if ($forums->lastPage() > 1)
		<div class="text-center text-bold">
			<img src="/images/loading.png" alt="" class="loading hidden" /><br>
			<a href="{{ $forums->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('forum._group')

	<a href="/forum/create">
		<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
	</a>

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $forums->nextPageUrl() }}';
</script>

@endpush
