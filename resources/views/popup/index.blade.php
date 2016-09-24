@extends('layouts.cms')

@section('title') Popup @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'POPUPS',
		]
	])

@stop

@section('cms-content')
	<div class="panel panel-blue">
		<div class="panel-heading">
			<h4 class="panel-title"><i class="fa fa-tags"></i> POPUPS</h4>
		</div>
		<div class="panel-body">
			<a href="/popup/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Popup</a>

			<b class="pull-right">
				Showing {{ $popups->firstItem() }} to {{ $popups->lastItem() }} of {{ $popups->total() }} entries
			</b>
		</div>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th style="width:220px;">Image</th>
					<th>Title</th>
					<th>URL</th>
					<th>Mulai</th>
					<th>Sampai</th>
					<th>Aktif</th>
					<th style="width:170px;">Action</th>
				</tr>
				{!! Form::open(['method' => 'GET']) !!}
				<tr>
					<td></td>
					<td></td>
					<td>
						<input type="text" name="title" value="{{ request('title') }}" placeholder="Title" class="form-control">
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						{!! Form::select('active', ['N' => 'No', 'Y' => 'Yes'], request('active'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
					</td>
					<td>
						<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
						<a href="/popup" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
					</td>
				</tr>
				{!! Form::close() !!}
			</thead>
			<tbody>
				<?php $i = $popups->firstItem(); ?>
				@foreach ($popups as $g)
				<tr>
					<td>{{ $i++ }}</td>
					<td><img src="/{{ $g->img }}" alt="" class="img-responsive" /></td>
					<td>{{ $g->title }}</td>
					<td><a href="{{ $g->url }}">{{ $g->url }}</a></td>
					<td>{{ $g->start }}</td>
					<td>{{ $g->end }}</td>
					<td>{{ $g->active ? 'Y' : 'N' }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/popup/'.$g->id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/popup/{{ $g->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="panel-footer text-center">
			{!! $popups->appends(['title' => request('title'),'active' => request('active')])->links() !!}
		</div>
	</div>

@stop
