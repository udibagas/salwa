<section class="comment-list">
	<article class="row">
		<div class="col-md-2 col-sm-2 hidden-xs">
			<figure class="thumbnail">
				@if ($p->ustadz && $p->ustadz->img_user)
				<img class="img-responsive" src="/{{ $p->ustadz->img_user }}" />
				@else
				<img class="img-responsive" src="/images/nobody.jpg" />
				@endif
				<figcaption class="text-center">{{ $p->ustadz ? $p->ustadz->name : '' }}</figcaption>
			</figure>
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user">
							<b><i class="fa fa-user"></i> {{ $p->ustadz ? $p->ustadz->name : '' }}</b><br>
							<em>
								@if ($p->group)
								<a href="/pertanyaan/?group_id={{ $p->group_id }}"><i class="fa fa-hashtag"></i> {{ $p->group->group_name }}</a>
								@endif
								<i class="fa fa-clock-o"></i> {{ $p->tgl_jawab ? $p->tgl_jawab->diffForHumans() : "" }}
							</em>
						</div>
					</header>

					<div class="comment-post">
						<h3> Jawaban: </h3>
						{!! nl2br($p->jawaban) !!}

					</div>
					@if (auth()->check() && auth()->user()->user_id == $p->dijawab_oleh)
					<p class="text-right">
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/jawab" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit Jawaban</a>
					</p>
					@endif
				</div>
			</div>
		</div>
	</article>
</section>
