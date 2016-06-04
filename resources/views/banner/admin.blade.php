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
				<th>Name</th>
				<th>Active</th>
				<th>Banner</th>
				<th style="width:180px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Name">
				</td>
				<td>{!! Form::select('active', ['1' => 'No', '2' => 'Yes'], request('active'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}</td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/area" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $banners->firstItem(); ?>
			@foreach ($banners as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $a->name }}</td>
					<td>{{ $a->active == 1 ? 'No' : 'Yes' }}</td>
					<td>
						@foreach ($a->positions as $p)
							<img src="/{{ $p->pivot->img_banner }}" alt="" style="width:200px;" /><br />
							({{ $p->width }} x {{ $p->height }})<br>
							<a href="{{ $p->pivot->url }}">{{ $p->pivot->url }}</a><br />
						@endforeach
					</td>
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
