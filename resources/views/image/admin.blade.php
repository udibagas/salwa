@extends('layouts.cms')

@section('title') Salwa Images @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/image/admin' => 'SALWA IMAGES'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-image"></i> SALWA IMAGES</h3>
		</div>
		<div class="panel-body">

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">

				{!! Form::select('group_id', \App\Group::active()->image()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-Semua Kategori-']) !!}

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
				<a href="/artikel/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>

				<a href="/image/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> ADD NEW IMAGE</a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th style="width:30px;">#</th>
						<th style="width:110px;">Image</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th style="width:180px;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $images->firstItem(); ?>
					@foreach ($images as $a)
						<tr>
							<td>{{ $i++ }}</td>
							<td><img src="/{{ $a->img_images }}" alt="" style="width:100px;" /></td>
							<td><a href="/image/{{ $a->id_salwaimages }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
							<td>{{ $a->group ? $a->group->group_name : '' }}</td>
							<td>
								{!! Form::open(['method' => 'DELETE', 'url' => '/image/'.$a->id_salwaimages]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<a href="/image/{{ $a->id_salwaimages }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
								<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} entries
			</div>
			{!! $images->appends(['judul' => request('judul'),'group_id' => request('group_id')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
