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
	<div class="panel panel-blue">
		<div class="panel-heading">
			<h4 class="panel-title"><i class="fa fa-tags"></i> GROUPS</h4>
		</div>
		<div class="panel-body">
			<a href="/group/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Group</a>

			<b class="pull-right">
				Showing {{ $groups->firstItem() }} to {{ $groups->lastItem() }} of {{ $groups->total() }} entries
			</b>
		</div>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th style="width:220px;">Name</th>
					<th>Type</th>
					<th>Description</th>
					<th>Deleted</th>
					<th style="width:170px;">Action</th>
				</tr>
				{!! Form::open(['method' => 'GET']) !!}
				<tr>
					<td></td>
					<td>
						<input type="text" name="group_name" value="{{ request('group_name') }}" placeholder="Name" class="form-control">
					</td>
					<td>
						{{ Form::select('type', \App\Group::active()->typeList(), request('type'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
					</td>
					<td>
						<input type="text" name="description" value="{{ request('description') }}" placeholder="Description" class="form-control">
					</td>
					<td>
						{!! Form::select('delete', ['Y' => 'Y', 'N' => 'N'], request('delete'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
					</td>
					<td>
						<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
						<a href="/group" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
					</td>
				</tr>
				{!! Form::close() !!}
			</thead>
			<tbody>
				<?php $i = $groups->firstItem(); ?>
				@foreach ($groups as $g)
				<tr class="@if ($g->delete == 'Y') danger @endif">
					<td>{{ $i++ }}</td>
					<td>{{ $g->group_name }}</td>
					<td>{{ $g->type }}</td>
					<td>{{ $g->description }}</td>
					<td>{{ $g->delete }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/group/'.$g->group_id]) !!}
						<a href="/group/{{ $g->group_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="panel-footer text-center">
			{!! $groups->appends(['group_name' => request('group_name'),'type' => request('type'),'description' => request('description')])->links() !!}
		</div>
	</div>

@stop
