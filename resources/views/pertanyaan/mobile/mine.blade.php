@extends('layouts.main')

@section('title', 'Pertanyaan Saya')

@section('content')


<h4 class="title"><i class="fa fa-question-circle"></i> PERTANYAAN SAYA</h4>
@each('pertanyaan.mobile._list', $pertanyaans, 'a')

<div class="text-center">
	{!! $pertanyaans->links() !!}
</div>

@include('pertanyaan._group')

@stop
