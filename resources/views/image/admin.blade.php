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

	<h4 class="title"><i class="fa fa-image"></i> SALWA IMAGES</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/image/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Image</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th style="width:30px;">#</th>
				<th style="width:110px;">Image</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:130px;">Action</th>
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
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/image/'.$a->id_salwaimages]) !!}
						<a href="/image/{{ $a->id_salwaimages }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $images->appends(['search' => request('search')])->links() !!}
	</div>

@stop
