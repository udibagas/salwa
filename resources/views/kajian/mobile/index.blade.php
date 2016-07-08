@extends('layouts.main')

@section('title', 'Kajian')

@section('content')

	<h4 class="title">JADWAL KAJIAN</h4>
	<div id="post-list">
		@each('kajian.mobile._list', $kajians, 'a')
	</div>

	@if ($kajians->lastPage() > 1)
		<div class="text-center text-bold">
			<img src="/images/loading.png" alt="" class="loading hidden" /><br>
			<a href="{{ $kajians->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('kajian._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/kajian/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $kajians->nextPageUrl() }}';
</script>

@endpush
