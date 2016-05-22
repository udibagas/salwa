@extends('layouts.cms')

@section('title') Kitab @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kitab/admin' => 'KITAB & TERJEMAHAN'
		]
	])

@stop

@section('cms-content')

	<h4 class="title"><i class="fa fa-book"></i> KITAB & TERJEMAHAN</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/kitab/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Add Kitab</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $kitabs->firstItem() }} to {{ $kitabs->lastItem() }} of {{ $kitabs->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Judul</th>
				<th>Penulis</th>
				<th>Kategori</th>
				<th style="width:150px;">Created At</th>
				<th style="width:150px;">Updated At</th>
				<th style="width:220px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="judul" value="{{ request('judul') }}" class="form-control" placeholder="Judul">
				</td>
				<td>
					<input type="text" name="penulis" value="{{ request('penulis') }}" class="form-control" placeholder="Penulis">
				</td>
				<td>
					{!! Form::select('group_id', \App\Group::kitab()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), request('group_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
				</td>
				<td></td>
				<td></td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/kitab/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $kitabs->firstItem(); ?>
			@foreach ($kitabs as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/kitab/{{ $a->buku_id }}-{{ str_slug($a->judul) }}">{{ $a->judul }}</a></td>
					<td>{{ $a->penulis }}</td>
					<td>{{ $a->group ? $a->group->group_name : '' }}</td>
					<td>{{ $a->created }}</td>
					<td>{{ $a->updated }}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/kitab/'.$a->buku_id]) !!}
						<a href="/{{ $a->file_pdf }}" target="_blank" class="btn btn-warning btn-xs"><i class="fa fa-download"></i> Donwnload</a>
						<a href="/kitab/{{ $a->buku_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $kitabs->appends(['judul' => request('judul'),'group_id' => request('group_id'),'penulis' => request('penulis')])->links() !!}
	</div>

@stop
