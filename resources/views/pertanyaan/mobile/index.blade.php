@extends('layouts.main')

@section('title', 'Tanya Ustadz')

@section('content')


<h4 class="title"><i class="fa fa-heart-o"></i> TANYA USTADZ</h4>
@each('pertanyaan.mobile._list', $pertanyaans, 'a')

<div class="text-center">
	{!! $pertanyaans->links() !!}
</div>

@include('pertanyaan._group')

@stop
