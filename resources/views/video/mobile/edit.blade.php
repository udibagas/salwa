@extends('layouts.main')

@section('title', 'Video : Edit Video')

@section('content')

	<h4 class="title">EDIT VIDEO</h4>
	@include('video.mobile._form', ['url' => '/video/'.$video->video_id, 'method' => 'PUT'])

@stop
