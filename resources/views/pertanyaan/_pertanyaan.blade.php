<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			<img class="img-responsive" src="/images/nobody.jpg" />
		</div>
	</div>
	<div class="col-md-11 col-sm-10">
		<div class="panel @if ($p->status == 's') panel-info @else panel-danger @endif panel-comment">
			<div class="panel-heading">
				<strong>
					@if ($p->user)
					{{ $p->user->jenis_kelamin == 'p' ? 'Ikhwan' : 'Akhwat' }}
					@endif

					@if ($p->daerah_asal) ({{ $p->daerah_asal }}) @endif
				</strong>

				<span class="text-muted">
					asked {{ $p->tgl_tanya ? $p->tgl_tanya->diffForHumans() : "" }}
					@if ($p->group)
					on <a href="/pertanyaan/?group_id={{ $p->group_id }}">{{ $p->group->group_name }}</a>
					@endif
				</span>

				<div class="pull-right">
					{!! Form::open(['url' => '/pertanyaan/'.$p->pertanyaan_id, 'method' => 'DELETE']) !!}

					@can('update-pertanyaan')
					<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					@endcan

					@can('delete-pertanyaan', $pertanyaan)
					{!! Form::hidden('redirect', '/pertanyaan') !!}
					<button type="submit" name="delete" class="btn btn-xs btn-danger delete">
						<i class="fa fa-trash"></i> Hapus
					</button>
					@endcan

					{!! Form::close() !!}
				</div>
			</div>
			<div class="panel-body">
				<h4 style="margin-top:0;font-weight:bold;">Pertanyaan : {{ $p->judul_pertanyaan }}</h4>
				{!! nl2br($p->ket_pertanyaan) !!}
			</div>
		</div>
	</div>
</div>
