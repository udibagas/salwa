@extends('layouts.main')

@section('title', 'Forum : Create New Thread')

@section('content')

<h4 class="title">Buat Thread Baru</h4>
<div class="row-post">
	@include('forum.mobile._form', ['method' => 'POST', 'url' => '/forum'])
</div>

@include('forum._group', ['group' => null, 'groups' => \App\Group::forum()->active()->orderBy('group_name', 'ASC')->get()])

@endsection
