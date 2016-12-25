@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM SAYA',
		]
	])

@stop

@section('content')
<div class="panel panel-default" style="margin-top:0;">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-comments-o"></i> FORUM SAYA</h3>
	</div>
	<ul class="list-group">
		@each('forum._item', $forums, 'f')
	</ul>
</div>

<div class="text-center">
	{!! $forums->links() !!}
</div>

@stop
