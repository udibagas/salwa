@extends('layouts.main')

@section('title', '{{ $groupName }} : {{ $hadist->judul }}')

@section('content')

<div class="row-post text-center">
	<h3>{{ $hadist->judul }}</h3><hr />
	<div style="font-size:30px;">
		{{ $hadist->hadist }}
	</div>

	<br>

	<div class="">
		{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}
	</div>

	<br>

	@include('layouts._share')
</div>

<h4 class="title">Hadist Terkait</h4>
@each('hadist.mobile._list', $terkait, 'a')
@include('hadist._group')

@stop
