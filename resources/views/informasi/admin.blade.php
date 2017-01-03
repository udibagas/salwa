@extends('layouts.cms')

@section('title', 'Salwa Info')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/informasi/admin' => 'SALWA INFO'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-newspaper-o"></i> SALWA INFO</h3>
		</div>
		<div class="panel-body">
			<a href="/informasi/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> CREATE NEW INFORMASI
			</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Informasi">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/informasi/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($informasis->total() == 0)
			<li class="list-group-item text-center">Tidak ada informasi</li>
			@endif
			@foreach ($informasis as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/informasi/{{ $a->informasi_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-informasi-{{$a->informasi_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/informasi/'.$a->informasi_id, 'style' => 'display:none;', 'id' => 'delete-informasi-'.$a->informasi_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($a->group)
				<a href="/informasi?group_id={{ $a->group_id}}" class="text-bold">
					[{{ $a->group->group_name }}]
				</a>
				@endif

				<a href="{{ $a->url }}" class="text-bold">{{ $a->judul }}</a> &bull;
				{{ $a->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $informasis->firstItem() }} to {{ $informasis->lastItem() }} of {{ $informasis->total() }} entries
			</div>
			{!! $informasis->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
