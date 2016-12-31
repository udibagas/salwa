<div class="panel @if ($p->status == 'h') panel-danger @else panel-default @endif">
	<div class="panel-body">
		<div class="media">
			<div class="media-left">
				<img class="profile media-object img-circle" data-name="{{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}" data-width="40" data-height="40" />
			</div>
			<div class="media-body">

				<!-- <div class="pull-right">
					@can('update-pertanyaan', $p)
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit">Edit</a> &bull;
					@endcan

					@can('jawab-pertanyaan', $p)
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/jawab">Jawab</a> &bull;
					@endcan

					@can('delete-pertanyaan', $p)
						<a href="#" onclick="event.preventDefault(); if(confirm('Anda yakin?')) {document.getElementById('delete-pertanyaan-{{$p->pertanyaan_id}}').submit()}">Hapus</a>
						{!! Form::hidden('redirect', url()->current()) !!}
						{!! Form::open(['url' => '/pertanyaan/'.$p->pertanyaan_id, 'method' => 'DELETE', 'id' => 'delete-pertanyaan-'.$p->pertanyaan_id, 'style' => 'display:none;']) !!}
						{!! Form::close() !!}
					@endcan
				</div> -->

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

			<h4>
				<a href="{{ $p->url }}">{{ $p->judul_pertanyaan }}</a>
			</h4>

			{!! $p->ket_pertanyaan !!}

		</div>
	</div>
</div>
