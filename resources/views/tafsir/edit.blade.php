@extends('layouts.cms')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/tafsir/admin' => 'TAFSIR',
			'#' => 'EDIT TAFSIR'
		]
	])

@stop

@section('title', 'Tafsir')

@section('cms-content')
	@include('tafsir._form', ['method' => 'PUT', 'url' => '/tafsir/'.$tafsir->id])
@endsection
