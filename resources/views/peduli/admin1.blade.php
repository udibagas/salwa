@extends('layouts.cms')

@section('title') Peduli @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'INFORMASI'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">

				<input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User">

				{!! Form::select('group_id', \App\Group::active()->peduli()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-Semua Kategori-']) !!}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/peduli/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/peduli/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> CREATE NEW PEDULI</a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>User</th>
						<th>Kategori</th>
						<th style="width:150px;">Created</th>
						<th style="width:150px;">Updated</th>
						<th style="width:130px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $pedulis->firstItem(); ?>
					@foreach ($pedulis as $a)
						<tr>
							<td>{{ $i++ }}</td>
							<td><a href="{{ $a->url }}">{{ $a->judul }}</a></td>
							<td>{{ $a->user ? $a->user->name : '' }}</td>
							<td>{{ $a->group ? $a->group->group_name : '' }}</td>
							<td>{{ $a->created }}</td>
							<td>{{ $a->updated }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/peduli/'.$a->peduli_id]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<div class="btn-group">
									<a href="/peduli/{{ $a->peduli_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
			<b class="pull-right">
				Showing {{ $pedulis->firstItem() }} to {{ $pedulis->lastItem() }} of {{ $pedulis->total() }} entries
			</b>
			{!! $pedulis->appends(['judul' => request('judul'),'group_id' => request('group_id'),'user' => request('user')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
