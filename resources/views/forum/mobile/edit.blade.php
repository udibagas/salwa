@extends('layouts.main')

@section('title', 'Forum : Edit Forum')

@section('content')

<h4 class="title">EDIT FORUM</h4>
<div class="row-post no-gutter">
	@include('forum.mobile._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])
</div>

@include('forum._panduan')

@stop
