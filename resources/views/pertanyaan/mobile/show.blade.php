@extends('layouts.main')

@section('title', 'Tanya Ustadz : {{ $pertanyaan->judul_pertanyaan }}')

@section('content')

<div class="row-post">
	<h3>Pertanyaan: {{ $pertanyaan->judul_pertanyaan }}</h3>
	<small>
		<strong>
			@if ($pertanyaan->user)
			{{ $pertanyaan->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}
			@endif

			@if ($pertanyaan->daerah_asal) ({{ $pertanyaan->daerah_asal }}) @endif
		</strong>

		<span class="">
			asked {{ $pertanyaan->tgl_tanya ? $pertanyaan->tgl_tanya->diffForHumans() : "" }}
			@if ($pertanyaan->group)
			on <a href="/pertanyaan/?group_id={{ $pertanyaan->group_id }}">{{ $pertanyaan->group->group_name }}</a>
			@endif
		</span>

	</small>
	<br>
	<br>

	{!! $pertanyaan->ket_pertanyaan !!}

</div>

<div class="row-post">
	@if ($pertanyaan->jawaban)
		<h3>Jawaban:</h3>

		<small>
			<strong>{{ $pertanyaan->ustadz ? $pertanyaan->ustadz->name : '' }}</strong>
			<span class="text-muted">answered {{ $pertanyaan->tgl_jawab ? $pertanyaan->tgl_jawab->diffForHumans() : "" }}</span>
		</small>

		<br><br>

		{!! $pertanyaan->jawaban !!}
	@else
	<strong class="text-danger">Belum ada jawaban untuk pertanyaan terkait.</strong>
	@endif

	<br><br>
	<div class="text-center">
		@include('layouts._share')
	</div>
	<br>
</div>

<h3 class="title">Pertanyaan Terkait</h3>
@each('pertanyaan.mobile._list', $terkait, 'a')

@include('pertanyaan._group')

@stop
