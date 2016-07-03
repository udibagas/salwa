@extends('layouts.main')

@section('title', 'Hadist : Edit Hadist')

@section('content')

	<h4 class="title">EDIT HADIST</h4>
	@include('hadist.mobile._form', ['url' => '/hadist/'.$hadist->hadist_id, 'method' => 'PUT'])

@stop
