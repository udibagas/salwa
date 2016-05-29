@extends('layouts.cms')

@section('title', 'Salwa Promo')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/banner/admin' => 'SALWA PROMO'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-microphone"></i> SALWA PROMO</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/banner/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Promo</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $banners->firstItem() }} to {{ $banners->lastItem() }} of {{ $banners->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th style="width:150px;">Kategori</th>
				<th style="width:350px;">Banner</th>
				<th>URL</th>
				<!-- <th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th> -->
				<th style="width:180px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = $banners->firstItem(); ?>
			@foreach ($banners as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td><img src="/{{ $a->img_banner }}" alt="" class="img-responsive" /></td>
					<td>
						<a href="{{ $a->url }}" target="_blank">
							{{ $a->url }}
						</a>
					</td>
					<!-- <td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td> -->
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/banner/'.$a->banner_id]) !!}
						<a href="/banner/{{ $a->banner_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $banners->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
	</div>

@stop
