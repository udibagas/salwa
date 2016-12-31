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
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-tags"></i> POPUPS</h3>
		</div>
		<div class="panel-body">

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="title" value="{{ request('title') }}" placeholder="Title" class="form-control">

				{!! Form::select('active', ['N' => 'Not Active', 'Y' => 'Active'], request('active'), ['class' => 'form-control', 'placeholder' => '-Status-']) !!}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/popup" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				<a href="/popup/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> ADD POPUP</a>
			{!! Form::close() !!}
			<hr>

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
						<th style="width:130px;">Action</th>
					</tr>
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
							<div class="btn-group">
								<a href="/popup/{{ $g->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
								<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
							</div>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer text-center">
			<div class="pull-right">
				Showing {{ $popups->firstItem() }} to {{ $popups->lastItem() }} of {{ $popups->total() }} entries
			</div>
			{!! $popups->appends(['title' => request('title'),'active' => request('active')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>

@stop
