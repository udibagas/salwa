@extends('layouts.user')

@section('title', 'Pertanyaan Saya')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'PERTANYAAN SAYA',
		]
	])

@stop

@section('user-content')

<div class="panel panel-default">

	<div class="panel-heading">
		@if (auth()->user()->pertanyaans()->where('status', '!=', 's')->count() > 0)
			<!-- <a href="/hapus-pertanyaan-saya" class="pull-right">Hapus pertanyaan saya yang belum dijawab</a> -->
		@endif


		<h3 class="panel-title"><i class="fa fa-question-circle-o"></i> PERTANYAAN SAYA</h3>
	</div>

	<div class="panel-body">

		{!! Form::open(['class' => 'form-inline', 'method' => 'GET']) !!}
			<a href="/pertanyaan/create" class="btn btn-primary">
				<i class="fa fa-plus-circle"></i> BUAT PERTANYAAN
			</a>

			@if (request('status') == 's')
			<a class="btn btn-primary" href="/pertanyaan-saya?q={{ request('q') }}">Tampilkan semua pertanyaan</a>
			@else
			<a class="btn btn-primary" href="/pertanyaan-saya?q={{ request('q') }}&status=s">Hanya tampilkan pertanyaan yang sudah dijawab</a>
			@endif

			<div class="pull-right">
				{!! Form::text('q', request('q'), ['placeholder' => 'Search Pertanyaan', 'class' => 'form-control']) !!}
				<input type="hidden" name="status" value="{{ request('status') }}">
				<button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i></button>
				<a href="/pertanyaan-saya" class="btn btn-primary"><i class="fa fa-refresh"></i></a>
			</div>
		{!! Form::close() !!}

	</div>

	<ul class="list-group">
		@if (count($pertanyaans) == 0)
			<li class="list-group-item text-center">Tidak ada pertanyaan.</li>
		@endif
		@foreach($pertanyaans as $p)
		<li class="list-group-item @if ($p->status != 's') disabled @endif">
			@if ($p->status != 's')
			<div class="pull-right">
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit">Edit</a> &bull;
				<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-pertanyaan-{{$p->pertanyaan_id}}').submit()}">Hapus</a>

				{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id, 'style' => 'display:none;', 'id' => 'delete-pertanyaan-'.$p->pertanyaan_id]) !!}
					{!! Form::hidden('redirect', url()->full()) !!}
				{!! Form::close() !!}
			</div>
			@endif

			<a href="{{ $p->url }}"><strong>{{ $p->judul_pertanyaan }}</strong></a><br>

			@if ($p->group)
			<a href="/pertanyaan?group_id={{ $p->group_id }}">{{ $p->group->group_name }}</a> &bull;
			@endif

			{{ $p->created->diffForHumans() }}
		</li>
		@endforeach
	</ul>

	<div class="panel-footer">
		<div class="pull-right">
			Showing {{ $pertanyaans->firstItem() }} to {{ $pertanyaans->lastItem() }} of {{ $pertanyaans->total() }} entries
		</div>
		{!! $pertanyaans->appends(['q' => request('q')])->links() !!}
		<div class="clearfix"></div>
	</div>

</div>

@endsection
