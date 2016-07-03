@extends('layouts.cms')

@section('title', 'Artikel : Edit Artikel')

@section('content')

	<h4 class="title"><i class="fa fa-edit"></i> Edit Artikel</h4>
	<div class="row-post">
		@include('artikel.mobile._form', ['url' => '/artikel/'.$artikel->artikel_id, 'method' => 'PUT'])
	</div>

@stop
