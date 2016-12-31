@extends('layouts.cms')

@section('title', 'Salwa Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/banner/admin' => 'SALWA PROMO'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-list"></i> BANNERS</h3>
		</div>
		<div class="panel-heading">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Name">

				<input type="text" name="url" value="{{ request('url') }}" class="form-control" placeholder="URL">

				{!! Form::select('active', ['inactive' => 'Not Active', 'active' => 'Active'], request('active'), ['class' => 'form-control', 'placeholder' => '-Status-']) !!}</td>

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/area" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/banner/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> ADD BANNER</a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Banner</th>
						<th>Name</th>
						<th>URL</th>
						<th>Active</th>
						<th style="width:130px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $banners->firstItem(); ?>
					@foreach ($banners as $a)
						<tr class="@if ($a->active) success @endif">
							<td>{{ $i++ }}</td>
							<td><img src="/{{ $a->img }}" alt="" style="width:250px;" /></td>
							<td>{{ $a->name }}</td>
							<td>{{ $a->url }}</td>
							<td>{{ $a->active == 1 ? 'Yes' : 'No' }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/banner/'.$a->banner_id]) !!}
								<div class="btn-group">
									<a href="/banner/{{ $a->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
									<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
								</div>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $banners->firstItem() }} to {{ $banners->lastItem() }} of {{ $banners->total() }} entries
			</div>
			{!! $banners->appends(['name' => request('name'), 'url' => request('url')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
