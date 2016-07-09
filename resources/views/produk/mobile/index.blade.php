@extends('layouts.main')

@section('title', 'Salwa Market')

@section('content')

	<h4 class="title">SALWA MARKET</h4>
	<div id="post-list">
		@each('produk.mobile._list', $produks, 'a')
	</div>

	@if ($produks->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $produks->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('produk._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/produk/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $produks->nextPageUrl() }}';
</script>

@endpush
