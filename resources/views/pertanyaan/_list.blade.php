<div class="panel @if ($p->status == 'h') panel-danger @else panel-blue @endif">
	<div class="panel-body">
		<div class="media">
			<div class="media-left">
				<img class="profile media-object img-circle" data-name="{{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}" data-width="40" data-height="40" />
			</div>
			<div class="media-body">

				<div class="pull-right">
					{!! Form::open(['url' => '/pertanyaan/'.$p->pertanyaan_id, 'method' => 'DELETE']) !!}
					@can('update-pertanyaan', $p)
					<div class="btn-group">
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
						@endcan
						@can('jawab-pertanyaan', $p)
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/jawab" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Jawab</a>
						@endcan
						@can('delete-pertanyaan', $p)
						{!! Form::hidden('redirect', url()->current()) !!}
						<button type="submit" name="submit" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i> Hapus</button>
						@endcan
					</div>
					{!! Form::close() !!}
				</div>

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
					<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
						{{ $p->judul_pertanyaan }}
					</a>
			</h4>

			{!! $p->ket_pertanyaan !!}

		</div>
	</div>
</div>
