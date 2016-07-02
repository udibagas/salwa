@extends('layouts.main')

@section('title', 'Forum : Edit Forum')

@section('content')

<h4 class="title"><i class="fa fa-edit"></i> Edit Forum</h4>
<div class="row-post no-gutter">
	@include('forum.mobile._form', ['url' => '/forum/'.$forum->forum_id, 'method' => 'PUT'])
</div>

@include('forum._panduan')

@stop
