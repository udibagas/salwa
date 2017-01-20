@extends('layouts.cms')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian-tematik/admin' => 'KAJIAN'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-edit"></i> KAJIAN</h3>
		</div>
		<div class="panel-body">
			<a href="/kajian/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> ADD INFO KAJIAN</a>

			{!! Form::open(['method' => 'GET', 'class' => 'form-inline pull-right']) !!}
				<input type="hidden" name="status" value="{{ request('status') }}">
				<input type="text" name="q" value="{{ request('q') }}" placeholder="Search Kajian" class="form-control">

				<button type="submit" name="filter" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/kajian/admin" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			{!! Form::close() !!}

			<hr>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Tema</th>
						<th>Waktu</th>
						<th>Tempat</th>
						<th>CP</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = $kajians->firstItem(); ?>
					@foreach ($kajians as $a)
						<tr>
							<td>
								<a href="/kajian/{{ $a->id }}-{{ str_slug($a->tema) }}">{{ $a->tema }}</a><br>
								<strong>{{ $a->ustadz ? $a->ustadz->ustadz_name : '' }}</strong><br>
								<div class="text-muted">
									{{ $a->rutin ? 'Rutin' : 'Tematik' }} &bull; {{ $a->peserta }}
								</div>
							</td>
							<td> {!! $a->waktuParsed !!} </td>
							<td>
								{{ $a->tempat }}<br>
								{{ $a->area ? $a->area->nama_area : '' }} - {{ $a->lokasi ? $a->lokasi->nama_lokasi : '' }}
							</td>
							<td>{!! $a->cp !!}</td>
							<td>
								<a href="/kajian/{{ $a->id }}/edit">Edit</a> &bull;
								<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-kajian-{{$a->id}}').submit()}">Hapus</a>

								{!! Form::open(['method' => 'DELETE', 'url' => '/kajian/'.$a->kajian_id, 'style' => 'display:none;', 'id' => 'delete-kajian-'.$a->id]) !!}
								{!! Form::hidden('redirect', url()->full()) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="panel-footer">
			<div class="pull-right">
				Showing {{ $kajians->firstItem() }} to {{ $kajians->lastItem() }} of {{ $kajians->total() }} entries
			</div>
			{!! $kajians->appends(['q' => request('q')])->links() !!}
			<div class="clearfix"></div>
		</div>
	</div>

@stop
