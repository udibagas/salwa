@extends('layouts.main')

@section('title', 'Hadist : Add New Hadist')

@section('content')

	<h4 class="title">TAMBAH HADIST</h4>
	@include('hadist.mobile._form', ['url' => '/hadist', 'method' => 'POST'])

@stop
