@extends('layouts.main')

@section('title', 'Tanya Ustadz : {{ $pertanyaan->judul_pertanyaan }}')

@section('content')
<div class="row-post">
	<h3>{{ $pertanyaan->judul_pertanyaan}}</h3>
</div>
<div class="row-post text-center">
	@include('layouts._share')
</div>

<div class="row-post text-center">
	{!! Form::open(['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id, 'method' => 'DELETE']) !!}

	<div class="btn-group">
		@can('update-pertanyaan')
		<a href="/pertanyaan/{{$pertanyaan->pertanyaan_id}}/edit" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
		@endcan

		@can('update-pertanyaan')
		<a href="/pertanyaan/{{$pertanyaan->pertanyaan_id}}/jawab" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit Jawaban</a>
		@endcan

		@can('delete-pertanyaan', $pertanyaan)
		<button type="submit" name="delete" class="btn btn-danger delete btn-xs">
			<i class="fa fa-trash"></i> Hapus
		</button>
		@endcan
	</div>

	{!! Form::hidden('redirect', '/pertanyaan') !!}
	{!! Form::close() !!}
</div>

<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:40px;width:40px;">
				<img class="media-object profile" alt="{{ $pertanyaan->judul_pertanyaan }}" data-name="{{ $pertanyaan->judul_pertanyaan }}">
			</div>
		</div>
		<div class="media-body">
			<strong>
				{{ $pertanyaan->user ? $pertanyaan->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' : '' }}
				@if ($pertanyaan->daerah_asal) ({{ $pertanyaan->daerah_asal }}) @endif
			</strong>
			<div class="text-muted">
				{{ $pertanyaan->tgl_tanya ? $pertanyaan->tgl_tanya->diffForHumans() : "" }}
				@if ($pertanyaan->group)
				on <a href="/pertanyaan/?group_id={{ $pertanyaan->group_id }}">{{ $pertanyaan->group->group_name }}</a>
				@endif
			</div>
		</div>
	</div>
	<br>

	{!! $pertanyaan->ket_pertanyaan !!}

</div>

@if ($pertanyaan->jawaban)
<div class="row-post">
		<div class="media">
			<div class="media-left">
				<div style="width:40px;height:40px;">
					@if ($pertanyaan->ustadz && $pertanyaan->ustadz->img_user)
					<img class="media-object img-circle cover" src="/{{ $pertanyaan->ustadz->img_user }}" />
					@else
					<img class="media-object img-circle cover" src="/images/logo-padding.png" style="border: 1px solid #D9EDF7;" />
					@endif
				</div>
			</div>
			<div class="media-body">

				<strong>{{ $pertanyaan->ustadz ? $pertanyaan->ustadz->name : '' }}</strong>
				<div class="text-muted">
					{{ $pertanyaan->tgl_jawab ? $pertanyaan->tgl_jawab->diffForHumans() : "" }}
				</div>

			</div>
		</div>
		<br>
		{!! $pertanyaan->jawaban !!}
</div>

@else
<div class="row-post">
	<strong class="text-danger">Belum ada jawaban untuk pertanyaan terkait.</strong>
	<br>
	<br>

	@can('jawab-pertanyaan', $pertanyaan)
	@include('pertanyaan.ustadz._form-jawab')
	@endcan
</div>
@endif

<h3 class="title">Pertanyaan Terkait</h3>
@each('pertanyaan.mobile._list', $terkait, 'a')

@include('pertanyaan._group')

<a href="/pertanyaan/create">@include('layouts.add-btn-mobile')</a>

@stop
