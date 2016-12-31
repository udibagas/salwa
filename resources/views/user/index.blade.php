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
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-users"></i> USERS</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="user_name" value="{{ request('user_name') }}" placeholder="Username" class="form-control">

				<input type="text" name="name" value="{{ request('name') }}" placeholder="Display Name" class="form-control">

				{{ Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], request('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '-Sex-']) }}

				<input type="text" name="email" value="{{ request('email') }}" placeholder="Email" class="form-control">

				{{ Form::select('user_status', \App\User::roleList(), request('user_status'), ['class' => 'form-control', 'placeholder' => '-Role-']) }}

				{{ Form::select('active', ['Y' => 'Yes', 'N' => 'No'], request('active'), ['class' => 'form-control', 'placeholder' => '-Status-']) }}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i></button>
				<a href="/user" class="btn btn-warning"><i class="fa fa-refresh"></i></a>

				<a href="/user/create" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i></a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Display Name</th>
						<th>Sex</th>
						<th>Email</th>
						<th>Role</th>
						<th>Active</th>
						<th>Join</th>
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
							{!! Form::hidden('redirect', url()->full()) !!}
							<div class="btn-group">
								<a href="/user/{{ $u->user_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
				Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
			</div>
			{!! $users->appends(['user_name' => request('user_name'),'name' => request('name'),'email' => request('email'),'user_status' => request('user_status'),'active' => request('active'),'jenis_kelamin' => request('jenis_kelamin')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>

@endsection
