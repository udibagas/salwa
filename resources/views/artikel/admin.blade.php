@extends('layouts.cms')

@section('title') Aktual @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/artikel/admin' => 'AKTUAL'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-file-text"></i> SALWA AKTUAL</h3>
		</div>
		<div class="panel-body">
			<a href="/artikel/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> CREATE NEW ARTIKEL
			</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Artikel">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/artikel/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($artikels->total() == 0)
			<li class="list-group-item text-center">Tidak ada artikel</li>
			@endif
			@foreach ($artikels as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/artikel/{{ $a->artikel_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-artikel-{{$a->artikel_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/artikel/'.$a->artikel_id, 'style' => 'display:none;', 'id' => 'delete-artikel-'.$a->artikel_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($a->group)
				<a href="/artikel?group_id={{ $a->group_id}}" class="text-bold">[{{ $a->group->group_name }}]</a>
				@endif
				<a href="{{ $a->url }}" class="text-bold">{{ $a->judul }}</a><br>
				@if ($a->user)
				<a href="/artikel?user_id={{ $a->user_id }}">{{ $a->user->name }}</a> &bull;
				@endif
				{{ $a->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $artikels->firstItem() }} to {{ $artikels->lastItem() }} of {{ $artikels->total() }} entries
			</div>
			{!! $artikels->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
