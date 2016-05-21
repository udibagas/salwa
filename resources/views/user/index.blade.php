@extends('layouts.cms')

@section('title', 'Users')

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
		<a href="/user/create" class="btn btn-info"><i class="fa fa-user-plus"></i> Add User</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
		</b>
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
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="user_name" value="{{ request('user_name') }}" placeholder="Username" class="form-control">
				</td>
				<td>
					<input type="text" name="name" value="{{ request('name') }}" placeholder="Display Name" class="form-control">
				</td>
				<td>
					{{ Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], request('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
				</td>
				<td>
					<input type="text" name="email" value="{{ request('email') }}" placeholder="Email" class="form-control">
				</td>
				<td>
					{{ Form::select('user_status', \App\User::roleList(), request('user_status'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
				</td>
				<td>
					{{ Form::select('active', ['Y' => 'Yes', 'N' => 'No'], request('active'), ['class' => 'form-control', 'placeholder' => '-All-']) }}
				</td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/user" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
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
		{!! $users->appends(['user_name' => request('user_name'),'name' => request('name'),'email' => request('email'),'user_status' => request('user_status'),'active' => request('active'),'jenis_kelamin' => request('jenis_kelamin')])->links() !!}
	</div>

@endsection
