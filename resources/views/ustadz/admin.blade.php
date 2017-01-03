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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-users"></i> USTADZ</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Ustadz">
				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/ustadz/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}

			<a href="/ustadz/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD USTADZ</a>
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
					<th>Created At</th>
					<th>Updated At</th>
					<th class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = $ustadzs->firstItem(); ?>
				@foreach ($ustadzs as $a)
					<tr>
						<td>{{ $i++ }}</td>
						<td><a href="/ustadz/{{ $a->ustadz_id }}-{{ str_slug($a->ustadz_name) }}">{{ $a->ustadz_name }}</a></td>
						<td>{{ $a->ustadz_address }}</td>
						<td>{{ $a->ustadz_phone }}</td>
						<td>{{ $a->ustadz_gender == 'P' ? 'Pria' : 'Wanita' }}</td>
						<td>{{ $a->ustadz_status == 'A' ? 'Aktif' : 'Nonaktif' }}</td>
						<td>{{ $a->created }}</td>
						<td>{{ $a->updated }}</td>
						<td class="text-right">
							<a href="/ustadz/{{ $a->ustadz_id }}/edit">Edit</a> &bull;
							<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-ustadz-{{$a->ustadz_id}}').submit()}">Hapus</a>

							{!! Form::open(['method' => 'DELETE', 'url' => '/ustadz/'.$a->ustadz_id, 'id' => 'delete-ustadz-'.$a->ustadz_id, 'style' => 'display:none;']) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $ustadzs->firstItem() }} to {{ $ustadzs->lastItem() }} of {{ $ustadzs->total() }} entries
			</div>
			{!! $ustadzs->appends(['ustadz_name' => request('ustadz_name'),'ustadz_address' => request('ustadz_address'),'ustadz_phone' => request('ustadz_phone'),'ustadz_gender' => request('ustadz_gender'),'ustadz_status' => request('ustadz_status')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
