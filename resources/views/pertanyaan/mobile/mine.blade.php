@extends('layouts.main')

@section('title', 'Pertanyaan Saya')

@section('content')


<h4 class="title">PERTANYAAN SAYA</h4>
<div id="post-list">
	@each('pertanyaan.mobile._list', $pertanyaans, 'a')
</div>

@if ($pertanyaans->lastPage() > 1)
	<div class="text-center text-bold">
		<br /><img src="/images/loading.png" alt="" class="loading hidden" />
		<a href="{{ $pertanyaans->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
	</div>
@endif

@include('pertanyaan._group')

<a href="/pertanyaan/create">@include('layouts.add-btn-mobile')</a>

@stop
