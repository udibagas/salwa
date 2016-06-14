@extends('layouts.main')

@section('title', $groupName.' : '.$hadist->judul)

@section('content')

<div class="row-post text-center">
	<h3 style="margin-top:5px;">{{ $hadist->judul }}</h3>
</div>

<div class="row-post text-center" style="font-size:27px;">
	{{ $hadist->hadist }}
</div>

<div class="row-post text-center">
	{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}
</div>

<div class="row-post text-center">
	@include('layouts._share')
</div>

<h4 class="title">Hadist Terkait</h4>
@each('hadist.mobile._list', $terkait->take(5), 'a')
@include('hadist._group')

@stop
