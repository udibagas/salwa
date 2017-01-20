@extends('layouts.main')

@section('title', 'Kajian : Add New Kajian')

@section('content')

	<h4 class="title">TAMBAH KAJIAN</h4>
	@include('kajian-old.mobile._form', ['url' => '/kajian', 'method' => 'POST'])

@stop
