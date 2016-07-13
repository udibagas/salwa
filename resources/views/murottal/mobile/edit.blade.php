@extends('layouts.main')

@section('title', 'Murottal : Edit Murottal')

@section('content')

	<h4 class="title">EDIT MUROTTAL</h4>
	@include('murottal.mobile._form', ['url' => '/murottal/'.$murottal->murotal_id, 'method' => 'PUT'])

@stop
