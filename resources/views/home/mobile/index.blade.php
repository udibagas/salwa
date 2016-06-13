@extends('layouts.main')

@section('title') Home @stop

@section('content')

	@include('home.mobile._artikel')
	@include('home.mobile._promo')
	@include('home.mobile._video')
	@include('home.mobile._pertanyaan')
	@each('home.mobile._forum', $forumKategori, 'group')
	@include('home.mobile._peduli')
	@include('home.mobile._informasi')

@stop
