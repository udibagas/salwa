@extends('layouts.main')

@section('title', 'FORUM : '.$group->group_name)

@section('content')

	<h4 class="title">{{ strtoupper($group->group_name) }}</h4>
	<div id="post-list">
		@each('forum.mobile._list', $forums, 'a')
	</div>

	<div class="text-center text-bold">
		<br>
		<img src="/images/loading.png" alt="" class="loading hidden" style="width:40px;" /><br>
		<a href="{{ $forums->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
	</div>

	@include('forum._group')

	<a href="/forum/create">@include('layouts.add-btn-mobile')</a>

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $forums->nextPageUrl() }}';
</script>

@endpush
