@extends('layouts.main')

@section('title', 'Profile : '.$user->name)

@section('content')

@if (session('error'))
	<div class="alert alert-danger text-center">
		<strong>{{ session('error') }}</strong>
	</div>
@endif

@if (session('success'))
	<div class="alert alert-success text-center">
		<strong>{{ session('success') }}</strong>
	</div>
@endif

<h4 class="title">PROFILE</h4>
<div class="row-post">
	@include('user._form', ['url' => '/user/'.$user->user_id, 'method' => 'PUT'])
</div>

<h4 class="title">PERTANYAAN</h4>
@each('pertanyaan.mobile._list', $user->pertanyaans->take(10), 'a')

<h4 class="title">FORUM</h4>
@each('forum.mobile._list', $user->forums->take(10), 'a')

@stop
