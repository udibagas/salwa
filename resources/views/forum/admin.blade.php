@extends('layouts.cms')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum/admin' => 'FORUM'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-comments-o"></i> SALWA FORUM</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<div class="row no-gutter">
			<div class="col-md-8">
				<a href="/forum/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Forum</a>
			</div>
			<div class="col-md-4 text-right">
				<p style="padding:5px 5px 0 0;">
					<b>
						Showing {{ $forums->firstItem() }} to {{ $forums->lastItem() }} of {{ $forums->total() }} entries
					</b>
				</p>
			</div>
		</div>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>User</th>
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="title" value="{{ request('title') }}" placeholder="Title" class="form-control">
				</td>
				<td>
					<input type="text" name="user" value="{{ request('user') }}" placeholder="User" class="form-control">
				</td>
				<td>
					{{ Form::select('group_id',
						\App\Group::forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						request('group_id'), [
							'class' => 'form-control',
							'placeholder' => '-- All --'
						]
					) }}
				</td>
				<td> </td>
				<td> </td>
				<td>
					<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/forum/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $forums->firstItem(); ?>
			@foreach ($forums as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/forum/{{ $a->forum_id }}-{{ str_slug($a->title) }}">{{ $a->title }}</a></td>
					<td>{{ $a->user ? $a->user->name : '' }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/forum/'.$a->forum_id]) !!}
						<a href="/forum/{{ $a->forum_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $forums->appends(['title' => request('title'),'user' => request('user'),'group_id' => request('group_id')])->links() !!}
	</div>

@stop
