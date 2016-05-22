@extends('layouts.main')

@section('title', 'Hadist')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'HADIST',
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-3">
			@include('hadist._group')
		</div>
		<div class="col-md-6">
			<h4 class="title"><i class="fa fa-list-alt"></i> HADIST</h4>
				<div class="list-group">
					@foreach ($hadists as $h)
					<a href="/hadist/{{ $h->hadist_id }}-{{ str_slug($h->judul) }}" class="list-group-item">
						<i class="fa fa-heartbeat"></i> {{ $h->judul }}
					</a>
					@endforeach
				</div>

			<nav class="text-center">
				{!! $hadists->appends(['search' => request('search'), 'group_id' => request('group_id')])->links() !!}
			</nav>

		</div>
		<div class="col-md-3">
			disini nanti ada slider random hadist
		</div>
	</div>

@stop
