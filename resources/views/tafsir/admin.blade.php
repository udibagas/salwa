@extends('layouts.cms')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/tafsir/admin' => 'TAFSIR'
		]
	])

@stop

@section('title', 'Tafsir')

@section('cms-content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">MANAGE TAFSIR</h3>
		</div>
		<div class="panel-body">
			<a href="/tafsir/create" class="btn btn-info">CREATE NEW TAFSIR</a>
		</div>
		<span id="table">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Surah</th>
						<th>Ayah</th>
						<th>Tafsir</th>
						<th>Action</th>
					</tr>
					{!! Form::open(['method' => 'GET']) !!}
					<tr>
						<td>
							{!! Form::select('surah_id', \App\Surah::selectRaw('CONCAT(id, ". ", nama) AS nama, id AS id')->orderBy('id', 'ASC')->pluck('nama', 'id'), request('surah_id'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
						</td>
						<td>
							<input type="text" name="ayah" value="{{ request('ayah') }}" class="form-control" placeholder="Ayah">
						</td>
						<td>
							<input type="text" name="tafsir" value="{{ request('tafsir') }}" class="form-control" placeholder="Tafsir">
						</td>
						<td>
							<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
							<a href="/tafsir/admin" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
						</td>
					</tr>
					{!! Form::close() !!}
				</thead>
				<tbody>
					@foreach ($tafsirs as $t)
					<tr>
						<td>{{ $t->surah->nama }}</td>
						<td>{{ $t->from_ayah }} - {{ $t->to_ayah }}</td>
						<td>{!! $t->tafsir !!}</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'url' => '/tafsir/'.$t->id]) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							<a href="/tafsir/{{ $t->tafsir_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
							<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</span>
	</div>

	<div class="text-center" id="pagination">
		{!! $tafsirs->links() !!}
	</div>

@endsection
