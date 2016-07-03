@extends('layouts.main')

@section('title', 'Audio : Edit Audio')

@section('content')

	<h4 class="title">EDIT AUDIO</h4>
	@include('audio.mobile._form', ['url' => '/audio/'.$audio->mp3_download_id, 'method' => 'PUT'])

@stop
