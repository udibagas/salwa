@extends('layouts.main')

@section('title', 'Forum : Edit Post')

@section('content')

@include('post.mobile._form', ['url' => '/post/'.$post->post_id, 'method' => 'PUT'])

@stop
