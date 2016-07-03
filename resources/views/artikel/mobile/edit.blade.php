@extends('layouts.cms')

@section('title', 'Artikel : Edit Artikel')

@section('content')

	<h4 class="title">EDIT ARTIKEL</h4>
	<div class="row-post">
		@include('artikel.mobile._form', ['url' => '/artikel/'.$artikel->artikel_id, 'method' => 'PUT'])
	</div>

@stop
