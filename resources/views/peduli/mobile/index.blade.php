@extends('layouts.main')

@section('title', 'Salwa Peduli')

@section('content')

	<h4 class="title">SALWA PEDULI</h4>
	<div id="post-list">
		@each('peduli.mobile._list', $pedulis, 'a')
	</div>

	@if ($pedulis->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $pedulis->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('peduli._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/peduli/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $pedulis->nextPageUrl() }}';
</script>

@endpush
