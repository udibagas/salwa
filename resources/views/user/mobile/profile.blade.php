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
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="width:70px;height:70px;">
				@if ($user->img_user)
				<img class="img-responsive img-circle cover" src="/{{ $user->img_user }}" />
				@else
				<img class="img-responsive img-circle" src="/images/nobody.jpg" />
				@endif
			</div>
		</div>
		<div class="media-body">
			<h4 class="text-bold">{{ $user->name }}</h4>
			<b>({{ $user->user_name }})</b>
			<!-- <hr>
			{{ $user->email }}<br /> -->

		</div>
	</div>
</div>

<div class="row-post">
	@include('user.mobile._form', ['url' => '/user/'.$user->user_id, 'method' => 'PUT'])
</div>

<h4 class="title">PERTANYAAN</h4>
@each('pertanyaan.mobile._list', $user->pertanyaans->take(10), 'a')

<h4 class="title">FORUM</h4>
@each('forum.mobile._list', $user->forums->take(10), 'a')

@stop
