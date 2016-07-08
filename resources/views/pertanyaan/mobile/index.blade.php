@extends('layouts.main')

@section('title', 'Tanya Ustadz')

@section('content')


<h4 class="title">TANYA USTADZ</h4>
<div id="post-list">
	@each('pertanyaan.mobile._list', $pertanyaans, 'a')
</div>

<div class="text-center text-bold">
	<img src="/images/loading.png" alt="" class="loading hidden" /><br>
	<a href="{{ $pertanyaans->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
</div>

@include('pertanyaan._group')

<a href="/pertanyaan/create">@include('layouts.add-btn-mobile')</a>

@stop

@push('script')

<script type="text/javascript">
var url = '{{ $pertanyaans->nextPageUrl() }}';
</script>

@endpush
