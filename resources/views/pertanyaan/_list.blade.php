<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			@if ($p->user->img_user)
			<img class="img-responsive" src="/{{ $p->user->img_user }}" />
			@else
			<img class="img-responsive" src="/images/nobody.jpg" />
			@endif
		</div>
	</div>
	<div class="col-md-11 col-sm-10">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				<strong>
					{{ $p->user ? $p->user->name : '' }}
					@if ($p->daerah_asal) ({{ $p->daerah_asal }}) @endif
				</strong>
				<span class="text-muted">
					asked {{ $p->tgl_tanya ? $p->tgl_tanya->diffForHumans() : "" }}
					@if ($p->group)
					on <a href="/pertanyaan/?group_id={{ $p->group_id }}">{{ $p->group->group_name }}</a>
					@endif
				</span>
			</div>
			<div class="panel-body">
				<h4 style="margin-top:0;">
					<strong>
						<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
							{{ $p->judul_pertanyaan }}
						</a>
					</strong>
				</h4>

				{!! nl2br($p->ket_pertanyaan) !!}

				@if (auth()->check() && auth()->user()->user_id == $p->user_id && $p->jawaban == '')
				<p class="text-right">
					<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					<a href="/pertanyaan/{{$p->pertanyaan_id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
				</p>
				@endif
			</div>
		</div>
	</div>
</div>
