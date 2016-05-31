@extends('layouts.app')

@push('css')
	<link href="/css/carousel.css" rel="stylesheet">
	<link href="/css/comment.css" rel="stylesheet">
@endpush

@push('script')
	<script src="/js/carousel.js"></script>
@endpush

@section('footer')
	@include('layouts.footer')
@endsection
