@extends('layouts.main')

@section('title', 'Salwa Aktual')

@section('content')

<h4 class="title">SALWA AKTUAL</h4>
<div id="artikel-list">
	@each('artikel.mobile._list', $artikels, 'a')
</div>

<div class="row-post text-center text-bold">
	<img src="/images/loading.png" alt="" class="loading hidden" style="width:30px;" />
	<a href="{{ $artikels->nextPageUrl() }}" rel="next">LOAD MORE</a>
	<!-- {!! $artikels->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!} -->
</div>

@include('artikel._group')

@if (auth()->check() && auth()->user()->isAdmin())
<a href="/artikel/create">@include('layouts.add-btn-mobile')</a>
@endif

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $artikels->nextPageUrl() }}';
$('a[rel="next"]').on('click', function() {
	$.ajax({
		url: url,
		dataType: 'json',
		beforeSend: function() {
			$('.loading').removeClass('hidden');
		},
		success: function(json) {
			$('.loading').addClass('hidden');
			$('#artikel-list').append(json.html);
			url = json.nextPageUrl;
		}
	});
	return false;
});
</script>

@endpush
