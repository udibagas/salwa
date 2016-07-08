@extends('layouts.main')

@section('title', 'Salwa Info')

@section('content')

<h4 class="title">SALWA INFO</h4>
<div id="post-list">
	@each('informasi.mobile._list', $informasis, 'a')
</div>

@if ($informasis->lastPage() > 1)
	<div class="text-center text-bold">
		<img src="/images/loading.png" alt="" class="loading hidden" /><br>
		<a href="{{ $informasis->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
	</div>
@endif

@include('informasi._group')

@if (auth()->check() && auth()->user()->isAdmin())
<a href="/informasi/create">@include('layouts.add-btn-mobile')</a>
@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $informasis->nextPageUrl() }}';
</script>

@endpush
