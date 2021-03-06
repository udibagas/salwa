<div class="panel panel-default">
	<div class="panel-body">
		<h2>{{ $pertanyaan->judul_pertanyaan }}</h2>
		@include('layouts._share')
		<hr>

		<div class="media">
			<div class="media-left">
				<img class="profile media-object img-circle" data-name="{{ ($pertanyaan->user && $pertanyaan->user->jenis_kelamin == 'p') ? 'Ikhwan' : 'Akhwat' }}" data-width="40" data-height="40" />
			</div>
			<div class="media-body">
				<strong>
					@if ($p->user)
					{{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}
					@endif

					@if ($p->daerah_asal) ({{ $p->daerah_asal }}) @endif
				</strong>

				<div class="text-muted">
					{{ $p->tgl_tanya ? $p->tgl_tanya->diffForHumans() : "" }}
					@if ($p->group)
					on <a href="/pertanyaan/?group_id={{ $p->group_id }}">{{ $p->group->group_name }}</a>
					@endif
				</div>
			</div>
		</div>
		<br>
		{!! $p->ket_pertanyaan !!}
	</div>
</div>
