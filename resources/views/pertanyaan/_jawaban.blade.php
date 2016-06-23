	<div class="panel panel-blue">
		<div class="panel-body">
			<div class="media">
				<div class="media-left">
					<div style="width:40px;height:40px;">
						@if ($p->ustadz && $p->ustadz->img_user)
						<img class="media-object img-circle cover" src="/{{ $p->ustadz->img_user }}" />
						@else
						<img class="media-object img-circle cover" src="/images/logo-padding.png" style="border: 1px solid #D9EDF7;" />
						@endif
					</div>
				</div>
				<div class="media-body">

					@if (auth()->check() && auth()->user()->user_id == $p->dijawab_oleh)
					<div class="pull-right">
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/jawab" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit Jawaban</a>
					</div>
					@endif

					<strong>{{ $p->ustadz ? $p->ustadz->name : '' }}</strong>
					<div class="text-muted">
						{{ $p->tgl_jawab ? $p->tgl_jawab->diffForHumans() : "" }}
					</div>

				</div>
			</div>
			<br>
			{!! $p->jawaban !!}
		</div>
	</div>
