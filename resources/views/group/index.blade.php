@extends('layouts.cms')

@section('title') Group @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'GROUPS',
		]
	])

@stop

@section('cms-content')
	<h4 class="title"><i class="fa fa-tags"></i> GROUPS</h4>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th style="width:220px;">Name</th>
				<th>Type</th>
				<th>Description</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($groups as $g)
			<tr>
				<td>{{ $g->group_name }}</td>
				<td>{{ $g->type }}</td>
				<td>{{ $g->description }}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'url' => '/group/'.$g->group_id]) !!}
					<a href="/group/{{ $g->group_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $groups->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop
