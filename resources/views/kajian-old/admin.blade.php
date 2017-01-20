@extends('layouts.cms')

@section('title', 'Kajian')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/kajian/admin' => 'KAJIAN'
		]
	])

@stop

@section('cms-content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-edit"></i> KAJIAN</h3>
	</div>
	<div class="panel-body">
		<a href="/kajian/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> CREATE KAJIAN</a>

		<hr>

		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tema</th>
					<th>Ustadz</th>
					<th>CP Ikhwan</th>
					<th>CP Akhwat</th>
					<th>Status</th>
					<th>Jenis</th>
					<th>Waktu</th>
					<th>Tempat</th>
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
					<td></td>
					<td></td>
					<td>
						{!! Form::select('status', ['A' => 'Aktif', 'N' => 'Nonaktif'], request('status'), [
							'class' => 'form-control',
							'placeholder' => '-All-'
						]) !!}
					</td>
					<td>
						{!! Form::select('jenis', \App\KajianOld::jenisKajianList(), request('jenis'), [
							'class' => 'form-control',
							'placeholder' => '-All-'
						]) !!}
					</td>
					<td>
						{!! Form::select('hari', \App\KajianOld::getHari(), request('hari'), [
							'class' => 'form-control',
							'placeholder' => '-All-'
						]) !!}
					</td>
					<td>
						<input type="text" name="tempat" value="{{ request('tempat') }}" class="form-control" placeholder="Tempat">
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
						<td><a href="/kajian/{{ $a->kajian_id }}-{{ str_slug($a->kajian_tema) }}">{{ $a->kajian_tema }}</a></td>
						<td>{{ $a->ustadz ? $a->ustadz->ustadz_name : '' }}</td>
						<td>
							{{ $a->pic1 ? $a->pic1->pic_name : '' }}<br>
							{{ $a->pic1 ? $a->pic1->pic_phone : '' }}
						</td>
						<td>
							{{ $a->pic2 ? $a->pic2->pic_name : '' }}<br>
							{{ $a->pic2 ? $a->pic2->pic_phone : '' }}
						</td>
						<td>{{ $a->kajian_status == 'A' ? 'Aktif' : 'Nonaktif' }}</td>
						<td>{{ \App\KajianOld::jenisKajianList($a->jenis_kajian) }}</td>
						<td>
							@if ($a->jenis_kajian == 1)
							{{ $a->kajian_dates }}
							@elseif ($a->jenis_kajian == 2)
							{{ \App\KajianOld::getHari($a->setiap_hari) }}, {{ $a->setiap_jam }}
							@else
							{{ $a->setiap_tanggal }}
							@endif
						</td>
						<td>
							{{ $a->kajian_tempat }}<br>
							{{ $a->area ? $a->area->nama_area : '' }} - {{ $a->lokasi ? $a->lokasi->nama_lokasi : '' }}
						</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'url' => '/kajian/'.$a->kajian_id]) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							<a href="/kajian/{{ $a->kajian_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
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
		{!! $kajians->appends(['tema' => request('tema'),'ustadz' => request('ustadz'),'status' => request('status'),'jenis' => request('jenis'),'tempat' => request('tempat'),'hari' => request('hari')])->links() !!}
	</div>
</div>



@endsection
