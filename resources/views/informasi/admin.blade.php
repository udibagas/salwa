@extends('layouts.cms')

@section('title') Informasi @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi/admin' => 'INFORMASI'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-newspaper-o"></i> SALWA INFO</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/informasi/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create Informasi</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $informasis->firstItem() }} to {{ $informasis->lastItem() }} of {{ $informasis->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<!-- <th>User</th> -->
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">
				</td>
				<!-- <td>
					<input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User">
				</td> -->
				<td>
					{!! Form::select('group_id', \App\Group::active()->informasi()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/informasi/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $informasis->firstItem(); ?>
			@foreach ($informasis as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/informasi/{{ $a->informasi_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<!-- <td>{{ $a->user ? $a->user->name : '' }}</td> -->
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/informasi/'.$a->informasi_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/informasi/{{ $a->informasi_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $informasis->appends(['judul' => request('judul'),'group_id' => request('group_id')])->links() !!}
	</div>

@stop
