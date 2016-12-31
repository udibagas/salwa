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

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-shopping-cart"></i> SALWA MARKET</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline']) !!}
				<label for="">FILTER : </label>
				<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">

				{!! Form::select('group_id', \App\Group::active()->produk()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-Semua Kategori-']) !!}

				<input type="text" name="penulis" value="{{ request('penulis') }}" class="form-control" placeholder="Penulis">

				<input type="text" name="penerbit" value="{{ request('penerbit') }}" class="form-control" placeholder="Penerbit">

				<input type="text" name="harga" value="{{ request('harga') }}" class="form-control" placeholder="Harga">

				<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i></button>
				<a href="/produk/admin" class="btn btn-warning"><i class="fa fa-refresh"></i></a>

				<a href="/produk/create" class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i></a>
			{!! Form::close() !!}
			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Penulis</th>
						<th>Penerbit</th>
						<th>Harga</th>
						<th style="width:130px;">Action</th>
					</tr>
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
								{!! Form::open(['method' => 'DELETE', 'url' => '/produk/'.$a->id_produk]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								<div class="btn-group">
									<a href="/produk/{{ $a->id_produk }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
				Showing {{ $produks->firstItem() }} to {{ $produks->lastItem() }} of {{ $produks->total() }} entries
			</div>
			{!! $produks->appends(['judul' => request('judul'),'group_id' => request('group_id'),'penulis' => request('penulis'),'penerbit' => request('penerbit'),'harga' => request('harga')])->links() !!}
			<div class="clearfix"> </div>
		</div>
	</div>
@stop
