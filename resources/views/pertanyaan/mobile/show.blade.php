@extends('layouts.main')

@section('title', 'Tanya Ustadz : '.$pertanyaan->judul_pertanyaan)

@section('content')
<div class="row-post">
	<h3>{{ $pertanyaan->judul_pertanyaan}}</h3>
</div>
<div class="row-post text-center">
	@include('layouts._share')
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
<p class="text-center">
	<strong class="text-danger">Belum ada jawaban untuk pertanyaan terkait.</strong>
</p>
</div>
@endif

<h3 class="title">Pertanyaan Terkait</h3>
@each('pertanyaan.mobile._list', $terkait, 'a')

@include('pertanyaan._group')


{!! Form::open(['method' => 'DELETE']) !!}
	{!! Form::hidden('redirect', '/pertanyaan') !!}
	@can('update-pertanyaan', $pertanyaan)
		<a href="{{ url()->current() }}/jawab">
			<img data-name="JAWAB" class="profile img-circle" data-width="60" data-height="60" data-char-count="5" data-font-size="12" style="position:fixed;bottom:230px;right:20px;" />
		</a>
		@include('layouts.delete-btn-mobile')
		@include('layouts.edit-btn-mobile')
	@endcan
	<a href="/pertanyaan/create">@include('layouts.add-btn-mobile')</a>
{!! Form::close() !!}

@stop
