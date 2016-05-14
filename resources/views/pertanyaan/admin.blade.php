@extends('layouts.cms')

@section('title') Tanya Ustadz @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'TANYA USTADZ',
		]
	])

@stop

@section('cms-content')

<h4 class="title"><i class="fa fa-question-circle"></i> TANYA USTADZ</h4>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Judul Pertanyaan</th>
			<th>Penanya</th>
			<th>Jns. Kelamin</th>
			<th>Waktu Tanya</th>
			<th>Dijawab</th>
			<th>Penjawab</th>
			<th>Show</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pertanyaans as $p)
		<tr>
			<td>
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
					{{ $p->judul_pertanyaan }}
				</a>
			</td>
			<td>{{ $p->user->name }}</td>
			<td>{{ $p->user->jenis_kelamin == 'P' ? 'Pria' : 'Wanita' }}</td>
			<td>{{ $p->created->diffForHumans() }}</td>
			<td>
				@if ($p->jawaban)
					<span class="label label-success">Y</span>
				@else
					<span class="label label-warning">N</span>
				@endif
			</td>
			<td>{{ $p->ustadz ? $p->ustadz->name : '' }}</td>
			<td>{{ $p->status == 's' ? 'Y' : 'N' }}</td>
			<td>
				@if ($p->jawaban)
					
				@else
					{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
					<a href="/pertanyaan/{{ $p->pertanyaan_id }}/jawab" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Jawab</a>
					<!-- <a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button> -->
					{!! Form::close() !!}
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

<div class="text-center">
	{!! $pertanyaans->appends(['search' => Request::get('search')])->links() !!}
</div>

@stop
