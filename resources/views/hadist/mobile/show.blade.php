@extends('layouts.main')

@section('title', $groupName.' : '.$hadist->judul)

@section('content')

<div class="row-post">
	<h3 class="text-center">{{ $hadist->judul }}</h3>
	<hr style="border-color:#999">

	<div class="arab text-center" style="font-size:27px;">
		{{ $hadist->hadist }}
	</div>

	<div class="text-center">
		<hr style="border-top:1px dashed #999">

		{!! preg_replace('/(<[^>]+) style=".*?"/i', '$1', strip_tags(str_replace('&nbsp;', ' ', $hadist->penjelasan), '<p><br><i><em><strong><hr><img>')) !!}

		<hr style="border-top:1px dashed #999">
	</div>

	<div class="text-center">
		@include('layouts._share')
	</div>
</div>

<h4 class="title">HADIST TERKAIT</h4>
@each('hadist.mobile._list', $terkait->take(5), 'a')
@include('hadist._group')

@if (auth()->check() && auth()->user()->isAdmin())
	{!! Form::open(['method' => 'DELETE']) !!}
		{!! Form::hidden('redirect', '/hadist') !!}
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
		<a href="/hadist/create">@include('layouts.add-btn-mobile')</a>
	{!! Form::close() !!}
@endif

@stop
