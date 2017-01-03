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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-newspaper-o"></i> SALWA INFO</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">

				<!-- <input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User"> -->

				{!! Form::select('group_id', \App\Group::active()->informasi()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-Semua Kategori-']) !!}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/informasi/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/informasi/create" class="btn btn-primary pull-right">
					<i class="fa fa-plus-circle"></i> CREATE NEW INFORMASI
				</a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<!-- <th>User</th> -->
						<th>Kategori</th>
						<th style="width:150px;">Created At</th>
						<th style="width:150px;">Updated At</th>
						<th style="width:130px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $informasis->firstItem(); ?>
					@foreach ($informasis as $a)
						<tr>
							<td>{{ $i++ }}</td>
							<td><a href="{{ $a->url }}">{{ $a->judul }}</a></td>
							<!-- <td>{{ $a->user ? $a->user->name : '' }}</td> -->
							<td>{{ $a->group ? $a->group->group_name : '' }}</td>
							<td>{{ $a->created }}</td>
							<td>{{ $a->updated }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/informasi/'.$a->informasi_id]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<div class="btn-group">
									<a href="/informasi/{{ $a->informasi_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
				Showing {{ $informasis->firstItem() }} to {{ $informasis->lastItem() }} of {{ $informasis->total() }} entries
			</b>
			{!! $informasis->appends(['judul' => request('judul'),'group_id' => request('group_id')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
