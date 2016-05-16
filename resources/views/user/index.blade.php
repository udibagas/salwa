@extends('layouts.cms')

@section('title', 'Users')

@push('css')
	<link href="/DataTables/datatables.min.css" rel="stylesheet">
@endpush

@push('script')
	<script src="/DataTables/datatables.min.js"></script>
	<script type="text/javascript">
		// $('table').dataTable();
	</script>
@endpush

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'cms' => 'CMS',
			'#' => 'USERS',
		]
	])

@stop

@section('cms-content')
	<h4 class="title"><i class="fa fa-users"></i> USERS</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<div class="row no-gutter">
			<div class="col-md-4">
				{!! Form::open(['method' => 'GET', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!}
					<div class="form-group">
						<div class="input-group">
							<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search" class="form-control">
							<div class="input-group-addon"><i class="fa fa-search"></i></div>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
			<div class="col-md-4">
				<a href="/user/create" class="btn btn-info"><i class="fa fa-user-plus"></i> Add User</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
					</b>
				</p>
			</div>
		</div>
	</div>

	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Display Name</th>
				<th>Jenis Kelamin</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Member Since</th>
				<th style="width:130px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $users->firstItem(); ?>
			@foreach ($users as $u)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $u->user_name }}</td>
				<td><a href="/user/{{ $u->user_id }}">{{ $u->name }}</a></td>
				<td>{{ $u->jenis_kelamin == 'p' ? 'Pria' : 'Wanita' }}</td>
				<td><a href="mailto:{{ $u->email }}">{{ $u->email }}</a></td>
				<td>{{ $u->role }}</td>
				<td><b class="{{ $u->active == 'Y' ? 'text-success' : 'text-danger' }}">{{ $u->active }}</b></td>
				<td>{{ $u->created }}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'url' => '/user/'.$u->user_id]) !!}
					<a href="/user/{{ $u->user_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $users->appends(['search' => Request::get('search')])->links() !!}
	</div>

@endsection
