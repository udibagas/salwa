@extends('layouts.main')

@section('title', 'Salwa Images')
@section('image', 'http://www.salamdakwah.com/'.$images->first()->img_images)
@section('description', 'Poster Dakwah')

@section('content')

	<h4 class="title">SALWA IMAGES</h4>
	<div class="row-post" id="post-list">
		@each('image.mobile._list', $images, 'a')
	</div>

	@if ($images->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $images->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('image._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/image/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $images->nextPageUrl() }}';
</script>

@endpush
