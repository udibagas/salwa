@extends('layouts.main')

@section('title', 'Salwa Aktual')

@section('content')

<h4 class="title">SALWA AKTUAL</h4>
<div id="post-list">
	@each('artikel.mobile._list', $artikels, 'a')
</div>

@if ($artikels->lastPage() > 1)
	<div class="text-center text-bold">
		<img src="/images/loading.png" alt="" class="loading hidden" /><br>
		<a href="{{ $artikels->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
	</div>
@endif

@include('artikel._group')

@if (auth()->check() && auth()->user()->isAdmin())
<a href="/artikel/create">@include('layouts.add-btn-mobile')</a>
@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $artikels->nextPageUrl() }}';
</script>

@endpush
