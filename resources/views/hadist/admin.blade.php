@extends('layouts.cms')

@section('title') Hadist @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/hadist/admin' => 'HADIST'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-heartbeat"></i> HADIST, DO'A & DZIKIR</h3>
		</div>
		<div class="panel-body">
			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Hadist">
				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i> </button>
				<a href="/hadist/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}

			<a href="/hadist/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> ADD NEW HADIST
			</a>
		</div>
		<ul class="list-group">
			@if ($hadists->total() == 0)
			<li class="list-group-item text-center">Tidak ada hadist</li>
			@endif
			@foreach ($hadists as $a)
				<li class="list-group-item">
					<div class="pull-right">
						<a href="/hadist/{{ $a->hadist_id }}/edit">Edit</a> &bull;
						<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-hadist-{{$a->hadist_id}}').submit()}">Hapus</button>

						{!! Form::open(['method' => 'DELETE', 'url' => '/hadist/'.$a->hadist_id, 'id' => 'delete-hadist-'.$a->hadist_id, 'style' => 'display:none;']) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						{!! Form::close() !!}
					</div>
					<strong>
						@if ($a->group)
						<a href="/hadist?group_id={{ $a->group_id }}">[{{ $a->group->group_name }}]</a>
						@endif
						<a href="{{ $a->url }}">{{ $a->judul }}</a>
					</strong> &bull;
					{{ $a->created ? $a->created->diffForHumans() : '' }}
				</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $hadists->firstItem() }} to {{ $hadists->lastItem() }} of {{ $hadists->total() }} entries
			</div>
			{!! $hadists->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>
@stop
