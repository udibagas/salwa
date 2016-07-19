@extends('layouts.cms')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/tafsir/admin' => 'TAFSIR',
			'#' => 'CREATE NEW TAFSIR'
		]
	])

@stop

@section('title', 'Tafsir')

@section('cms-content')
	@include('tafsir._form', ['method' => 'POST', 'url' => '/tafsir'])
@endsection
