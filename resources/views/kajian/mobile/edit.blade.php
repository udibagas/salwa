@extends('layouts.main')

@section('title', 'Kajian : Edit Kajian')

@section('content')

	<h4 class="title">EDIT KAJIAN</h4>
	@include('kajian.mobile._form', ['url' => '/kajian/'.$kajian->kajian_id, 'method' => 'PUT'])

@stop
