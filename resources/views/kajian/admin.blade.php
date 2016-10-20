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

	<h4 class="title"><i class="fa fa-edit"></i> KAJIAN</h4>

	<div class="well well-sm" style="margin-bottom:10px;">
		<a href="/kajian/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create kajian</a>
		<b class="pull-right" style="padding-top:5px;">
			Showing {{ $kajians->firstItem() }} to {{ $kajians->lastItem() }} of {{ $kajians->total() }} entries
		</b>
	</div>

	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Tema</th>
				<th>Ustadz</th>
				<th>Peserta</th>
				<th>Jenis</th>
				<th>Waktu</th>
				<th>Tempat</th>
				<th>CP</th>
				<th style="width:170px;">Action</th>
			</tr>
			{!! Form::open(['method' => 'GET']) !!}
			<tr>
				<td></td>
				<td>
					<input type="text" name="tema" value="{{ request('tema') }}" class="form-control" placeholder="Tema Kajian">
				</td>
				<td>
					<input type="text" name="ustadz" value="{{ request('ustadz') }}" class="form-control" placeholder="Ustadz">
				</td>
				<td>
					{!! Form::select('peserta', \App\Kajian::getPesertaList(), request('peserta'), [
						'class' => 'form-control',
						'placeholder' => '-All-'
					]) !!}
				</td>
				<td>
					{!! Form::select('rutin', ['rutin' => 'Rutin', 'tematik' => 'Tematik'], request('rutin'), [
						'class' => 'form-control',
						'placeholder' => '-All-'
					]) !!}
				</td>
				<td>
					{!! Form::select('hari', \App\Kajian::getDay(), request('hari'), [
						'class' => 'form-control',
						'placeholder' => '-All-'
					]) !!}
				</td>
				<td>
					<input type="text" name="tempat" value="{{ request('tempat') }}" class="form-control" placeholder="Tempat">
				</td>
				<td>
					<input type="text" name="cp" value="{{ request('cp') }}" class="form-control" placeholder="CP">
				</td>
				<td>
					<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
					<a href="/kajian/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
				</td>
			</tr>
			{!! Form::close() !!}
		</thead>
		<tbody>
			<?php $i = $kajians->firstItem(); ?>
			@foreach ($kajians as $a)
				<tr>
					<td>{{ $i++ }}</td>
					<td><a href="/kajian/{{ $a->id }}-{{ str_slug($a->tema) }}">{{ $a->tema }}</a></td>
					<td>{{ $a->ustadz ? $a->ustadz->ustadz_name : '' }}</td>
					<td>{{ $a->peserta }}</td>
					<td>{{ $a->rutin ? 'Rutin' : 'Tematik' }}</td>
					<td>{!! $a->waktuParsed !!}</td>
					<td>
						{{ $a->tempat }}<br>
						{{ $a->area ? $a->area->nama_area : '' }} - {{ $a->lokasi ? $a->lokasi->nama_lokasi : '' }}
					</td>
					<td>{!! $a->cp !!}</td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => '/kajian/'.$a->id]) !!}
						<a href="/kajian/{{ $a->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="text-center">
		{!! $kajians->appends(['tema' => request('tema'),'ustadz' => request('ustadz'),'peserta' => request('peserta'),'rutin' => request('rutin'),'tempat' => request('tempat'),'hari' => request('hari'),'cp' => request('cp')])->links() !!}
	</div>

@stop
