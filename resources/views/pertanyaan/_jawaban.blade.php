<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			@if ($p->ustadz && $p->ustadz->img_user)
			<img class="img-responsive" src="/{{ $p->ustadz->img_user }}" />
			@else
			<img class="img-responsive" src="/images/nobody.jpg" />
			@endif
		</div>
	</div>
	<div class="col-md-11 col-sm-10">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				
				<strong>{{ $p->ustadz ? $p->ustadz->name : '' }}</strong>
				<span class="text-muted">answered {{ $p->tgl_jawab ? $p->tgl_jawab->diffForHumans() : "" }}</span>

				@if (auth()->check() && auth()->user()->user_id == $p->dijawab_oleh)
				<div class="pull-right">
					<a href="/pertanyaan/{{$p->pertanyaan_id}}/jawab" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit Jawaban</a>
				</div>
				@endif

			</div>
			<div class="panel-body">
				<h4 style="margin-top:0;font-weight:bold;"> Jawaban: </h4>
				{!! $p->jawaban !!}
			</div>
		</div>
	</div>
</div>
