@extends('layouts.main')

@section('title', 'Salwa Audio')

@section('content')

	<h4 class="title">SALWA AUDIO</h4>
	<div id="post-list">
		@each('audio.mobile._list', $audios, 'a')
	</div>

	<div class="text-center text-bold">
		<img src="/images/loading.png" alt="" class="loading hidden" /><br>
		<a href="{{ $audios->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
	</div>

	@include('audio._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/audio/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $audios->nextPageUrl() }}';
</script>

@endpush
