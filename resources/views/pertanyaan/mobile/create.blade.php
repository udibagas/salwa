@extends('layouts.main')

@section('title', 'Tanya Ustadz : Input Pertanyaan')

@section('content')

	<h4 class="title"><i class="fa fa-question-circle-o"></i> Input Pertanyaan</h4>
	<div class="row-post no-gutter">
		@include('pertanyaan.mobile._form', ['url' => '/pertanyaan', 'method' => 'post'])
	</div>
	@include('pertanyaan._group')

@endsection
