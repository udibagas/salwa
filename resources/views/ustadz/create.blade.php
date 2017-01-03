@extends('layouts.cms')

@section('title', 'Ustadz : Add New Ustadz')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/ustadz/admin' => 'USTADZ',
			'#' => 'New Ustadz',
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-user-plus"></i> TAMBAH USTADZ BARU</h3>
		</div>
		<div class="panel-body">
			@include('ustadz._form', ['url' => '/ustadz', 'method' => 'POST'])
		</div>
	</div>


@stop
