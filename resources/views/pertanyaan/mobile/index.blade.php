@extends('layouts.main')

@section('title', 'Tanya Ustadz')

@section('content')


<h4 class="title">TANYA USTADZ</h4>
@each('pertanyaan.mobile._list', $pertanyaans, 'a')

<div class="text-center">
	{!! $pertanyaans->links() !!}
</div>

@include('pertanyaan._group')

<a href="/pertanyaan/create">@include('layouts.add-btn-mobile')</a>

@stop
