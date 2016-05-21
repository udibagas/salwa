@extends('layouts.cms')

@section('title', 'Ustadz')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/ustadz/admin' => 'USTADZ'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-users"></i> USTADZ</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/ustadz/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Ustadz</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $ustadzs->firstItem() }} to {{ $ustadzs->lastItem() }} of {{ $ustadzs->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Addres</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Status</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="ustadz_name" value="{{ request('ustadz_name') }}" class="form-control" placeholder="Name">
				</td>
				<td>
					<input type="text" name="ustadz_address" value="{{ request('ustadz_address') }}" class="form-control" placeholder="Address">
				</td>
				<td>
					<input type="text" name="ustadz_phone" value="{{ request('ustadz_phone') }}" class="form-control" placeholder="Phone">
				</td>
				<td>
					{{ Form::select('ustadz_gender', ['P' => 'P', 'W' => 'W'], request('ustadz_gender'), ['class' => 'form-control', 'placeholder' => '-All-'])}}
				</td>
				<td>
					{{ Form::select('ustadz_status', ['A' => 'A', 'N' => 'N'], request('ustadz_status'), ['class' => 'form-control', 'placeholder' => '-All-'])}}
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/ustadz/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $ustadzs->firstItem(); ?>
			@foreach ($ustadzs as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/ustadz/{{ $a->ustadz_id }}-{{ str_slug($a->ustadz_name) }}">{{ $a->ustadz_name }}</a></td>
					<td>{{ $a->ustadz_address }}</td>
					<td>{{ $a->ustadz_phone }}</td>
					<td>{{ $a->ustadz_gender }}</td>
					<td>{{ $a->ustadz_status }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/ustadz/'.$a->ustadz_id]) !!}
						<a href="/ustadz/{{ $a->ustadz_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $ustadzs->appends(['ustadz_name' => request('ustadz_name'),'ustadz_address' => request('ustadz_address'),'ustadz_phone' => request('ustadz_phone'),'ustadz_gender' => request('ustadz_gender'),'ustadz_status' => request('ustadz_status')])->links() !!}
	</div>

@stop
