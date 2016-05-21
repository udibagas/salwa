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
							<b><i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}</b><br>
							<em><i class="fa fa-clock-o"></i> {{ $p->tgl_tanya ? $p->tgl_tanya->diffForHumans() : "" }}</em>
						</div>
					</header>

					<div class="comment-post">

						<h3>Pertanyaan : {{ $p->judul_pertanyaan }}</h3>
						<p>{!! nl2br($p->ket_pertanyaan) !!}</p>

					</div>
					@if (auth()->check() && auth()->user()->user_id == $p->user_id && $p->jawaban == null)
					{!! Form::open(['url' => '/pertanyaan/'.$p->pertanyaan_id, 'method' => 'DELETE']) !!}
					<p class="text-right">
						<a href="/pertanyaan/{{$p->pertanyaan_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
						<button type="submit" name="delete" class="btn btn-xs btn-danger">
							<i class="fa fa-trash"></i> Hapus
						</button>
					</p>
					{!! Form::close() !!}
					@endif
				</div>
			</div>
		</div>
	</article>
</section>
