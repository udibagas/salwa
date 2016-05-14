@extends('layouts.cms')

@section('title') Users @stop

@section('css')
<link href="/DataTables/datatables.min.css" rel="stylesheet">
@stop

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
	<a href="/user/create" class="btn btn-info"><i class="fa fa-user-plus"></i> Create User</a>
	<hr>
	<div class="row">
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
		<div class="col-md-8 text-right">
			Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
		</div>
	</div>

	<br />

	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Display Name</th>
				<th>Jenis Kelamin</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Member Since</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $u)
			<tr>
				<td>{{ $u->user_name }}</td>
				<td><a href="/user/{{ $u->user_id }}">{{ $u->name }}</a></td>
				<td>{{ $u->jenis_kelamin == 'p' ? 'Pria' : 'Wanita' }}</td>
				<td><a href="mailto:{{ $u->email }}">{{ $u->email }}</a></td>
				<td>{{ $u->role }}</td>
				<td>{{ $u->active }}</td>
				<td>{{ $u->created }}</td>
				<td>
					{!! Form::open(['method' => 'DELETE', 'url' => '/user/'.$u->user_id]) !!}
					<a href="/user/{{ $u->user_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $users->appends(['search' => Request::get('search')])->links() !!}
	</div>

@stop

@section('script')
<script src="/DataTables/datatables.min.js"></script>
<script type="text/javascript">
	// $('table').dataTable();
</script>
@stop
