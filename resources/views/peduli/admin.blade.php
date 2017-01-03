@extends('layouts.cms')

@section('title', 'Salwa Peduli')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/peduli/admin' => 'SALWA PEDULI'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-heart-o"></i> SALWA PEDULI</h3>
		</div>
		<div class="panel-body">
			<a href="/peduli/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> CREATE NEW PEDULI
			</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Peduli">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/peduli/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($pedulis->total() == 0)
			<li class="list-group-item text-center">Tidak ada informasi peduli</li>
			@endif
			@foreach ($pedulis as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/peduli/{{ $a->peduli_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-peduli-{{$a->peduli_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/peduli/'.$a->peduli_id, 'style' => 'display:none;', 'id' => 'delete-peduli-'.$a->peduli_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($a->group)
				<a href="/peduli?group_id={{ $a->group_id}}" class="text-bold">[{{ $a->group->group_name }}]</a>
				@endif
				<a href="{{ $a->url }}" class="text-bold">{{ $a->judul }}</a><br>
				@if ($a->user)
				<a href="/peduli?user_id={{ $a->user_id }}">{{ $a->user->name }}</a> &bull;
				@endif
				{{ $a->created->diffForHumans() }}
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $pedulis->firstItem() }} to {{ $pedulis->lastItem() }} of {{ $pedulis->total() }} entries
			</div>
			{!! $pedulis->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
