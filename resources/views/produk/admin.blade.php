@extends('layouts.cms')

@section('title', 'Produk')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/produk/admin' => 'PRODUK'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-shopping-cart"></i> SALWA MARKET</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/produk/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Product</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $produks->firstItem() }} to {{ $produks->lastItem() }} of {{ $produks->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>Kategori</th>
				<th>Penulis</th>
				<th>Penerbit</th>
				<th>Harga</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">
				</td>
				<td>
					{!! Form::select('group_id', \App\Group::active()->produk()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td>
					<input type="text" name="penulis" value="{{ request('penulis') }}" class="form-control" placeholder="Penulis">
				</td>
				<td>
					<input type="text" name="penerbit" value="{{ request('penerbit') }}" class="form-control" placeholder="Penerbit">
				</td>
				<td>
					<input type="text" name="harga" value="{{ request('harga') }}" class="form-control" placeholder="Harga">
				</td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/produk/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $produks->firstItem(); ?>
			@foreach ($produks as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/produk/{{ $a->produk_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->penulis }}</td>
					<td>{{ $a->penerbit }}</td>
					<td>{{ $a->harga }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/produk/'.$a->produk_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/produk/{{ $a->id_produk }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $produks->appends(['judul' => request('judul'),'group_id' => request('group_id'),'penulis' => request('penulis'),'penerbit' => request('penerbit'),'harga' => request('harga')])->links() !!}
	</div>

@stop
