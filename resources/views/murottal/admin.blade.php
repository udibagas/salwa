@extends('layouts.cms')

@section('title', 'Murottal')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal/admin' => 'MUROTTAL'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-microphone"></i> MUROTTAL</h3>
		</div>
		<div class="panel-body">
			<a href="/murottal/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD NEW MUROTTAL</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Murottal">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/murottal/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($murottals->total() == 0)
			<li class="list-group-item text-center">Tidak ada murottal</li>
			@endif
			@foreach ($murottals as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/murottal/{{ $a->murotal_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-murottal-{{$a->murotal_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/murottal/'.$a->murotal_id, 'id' => 'delete-murottal-'.$a->murotal_id, 'style' => 'display:none;']) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($a->group)
				<a href="/murottal?group_id={{ $a->group_id}}" class="text-bold">[{{ $a->group->group_name }}]</a>
				@endif
				<b>{{ $a->nama_surat }}</b> &bull;
				{{ $a->created ? $a->created->diffForHumans() : '' }}
				<br>
				<audio controls="controls" preload="none"><source src="/{{ $a->file_mp3 }}" type="application/ogg"></source></audio>
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $murottals->firstItem() }} to {{ $murottals->lastItem() }} of {{ $murottals->total() }} entries
			</div>
			{!! $murottals->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop
