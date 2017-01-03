@extends('layouts.cms')

@section('title', 'Salwa Audio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/audio/admin' => 'SALWA AUDIO'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-music"></i> SALWA AUDIO</h3>
		</div>
		<div class="panel-body">
			<a href="/audio/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD NEW AUDIO</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Search Audio">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/audio/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}
		</div>
		<ul class="list-group">
			@if ($audios->total() == 0)
			<li class="list-group-item text-center">Tidak ada audio</li>
			@endif
			@foreach ($audios as $a)
			<li class="list-group-item">
				<div class="pull-right">
					<a href="/audio/{{ $a->mp3_download_id }}/edit">Edit</a> &bull;
					<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-audio-{{$a->mp3_download_id}}').submit()}">Hapus</a>

					{!! Form::open(['method' => 'DELETE', 'url' => '/audio/'.$a->mp3_download_id, 'id' => 'delete-audio-'.$a->mp3_download_id, 'style' => 'display:none;']) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
					{!! Form::close() !!}
				</div>

				@if ($a->group)
				<a href="/audio?group_id={{ $a->group_id}}" class="text-bold">[{{ $a->group->group_name }}]</a>
				@endif
				<a href="{{ $a->url }}" class="text-bold">{{ $a->judul }}</a> &bull;
				{{ $a->created ? $a->created->diffForHumans() : '' }}
				<br>
				<audio controls="controls" preload="none"><source src="/{{ $a->file_mp3 }}" type="application/ogg"></source></audio>
			</li>
			@endforeach
		</ul>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $audios->firstItem() }} to {{ $audios->lastItem() }} of {{ $audios->total() }} entries
			</div>
			{!! $audios->appends(['judul' => request('judul'),'group_id' => request('group_id')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop
