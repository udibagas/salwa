<section class="comment-list">
	<article class="row">
		<div class="col-md-2 col-sm-2 hidden-xs">
			<figure class="thumbnail">
				@if ($p->user->img_user)
				<img class="img-responsive" src="/{{ $p->user->img_user }}" />
				@else
				<img class="img-responsive" src="/images/nobody.jpg" />
				@endif
				<figcaption class="text-center">{{ $p->user ? $p->user->name : '' }}</figcaption>
			</figure>
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user">
							<b>
								<i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}
								@if ($p->daerah_asal) ({{ $p->daerah_asal }}) @endif
							</b><br>
							<em>
								@if ($p->group)
								<a href="/pertanyaan/?group_id={{ $p->group_id }}"><i class="fa fa-hashtag"></i> {{ $p->group->group_name }}</a>
								@endif
								<i class="fa fa-clock-o"></i> {{ $p->updated ? $p->updated->diffForHumans() : "" }}
							</em>
						</div>
					</header>

					<div class="comment-post">
						<h3>
							<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">{{ $p->judul_pertanyaan }}</a>
						</h3>
						{!! nl2br($p->ket_pertanyaan) !!}

					</div>
					@if (auth()->check() && auth()->user()->user_id == $p->user_id && $p->jawaban == '')
					<p class="text-right">
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
					</p>
					@endif
				</div>
			</div>
		</div>
	</article>
</section>
