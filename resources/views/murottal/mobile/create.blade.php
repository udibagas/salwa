@extends('layouts.main')

@section('title', 'Murottal : Create New Murottal')

@section('content')

	<h4 class="title">TAMBAH MUROTTAL</h4>
	@include('murottal.mobile._form', ['url' => '/murottal', 'method' => 'POST'])

@stop
