@extends('layouts.main')

@section('title', 'Tanya Ustadz')

@section('content')


<h4 class="title"><i class="fa fa-question-circle"></i> TANYA USTADZ</h4>
@each('pertanyaan.mobile._list', $pertanyaans, 'a')

<div class="text-center">
	{!! $pertanyaans->links() !!}
</div>

@include('pertanyaan._group')

<a href="/pertanyaan/create">
	<img class="profile img-circle" data-name="+" style="position:fixed;bottom:20px;right:20px;" data-font-size="40" />
</a>

@stop
