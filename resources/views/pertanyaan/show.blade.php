@extends('layouts.main')

@section('title') Tanya Ustadz : {{ $pertanyaan->judul_pertanyaan }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/pertanyaan' => 'TANYA USTADZ',
			'#' => $pertanyaan->judul_pertanyaan,
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('pertanyaan._group')
	</div>
	<div class="col-md-9">

		@include('pertanyaan._pertanyaan', ['p' => $pertanyaan])

		@if ($pertanyaan->jawaban)
			@include('pertanyaan._jawaban', ['p' => $pertanyaan])
		@else

			@if (auth()->user() && auth()->user()->isUstadz())

				<div class="row">
					<div class="col-md-2 hidden-xs">
						<figure class="thumbnail">
							@if (auth()->user()->img_user)
							<img class="img-responsive" src="/{{ auth()->user()->img_user }}" />
							@else
							<img class="img-responsive" src="/images/nobody.jpg" />
							@endif
							<figcaption class="text-center">{{ auth()->user()->name }}</figcaption>
						</figure>
					</div>
					<div class="col-md-10">
						@include('pertanyaan._form-jawab', ['pertanyaan' => $pertanyaan])
					</div>
				</div>

			@else
				<br>
				<div class="alert alert-danger text-center">
					<strong>Belum ada jawaban untuk pertanyaan terkait.</strong>
				</div>
			@endif
		@endif

		<hr>
		@include('layouts._share')
		<hr>

		<h4 class="title">PERTANYAAN TERKAIT</h4>
		<ul class="list-group">
			@foreach ($terkait as $p)
			<li class="list-group-item">
				<b><a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a></b><br>
				<i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}
				<i class="fa fa-clock-o"></i> {{ $p->updated->diffForHumans() }}
			</li>
			@endforeach
		</ul>

	</div>
</div>

@stop
