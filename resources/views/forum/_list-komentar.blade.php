<section class="comment-list">
	<article class="row">
		<div class="col-md-2 col-sm-2 hidden-xs">
			<figure class="thumbnail">
				<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
				<figcaption class="text-center">{{ $p->user ? $p->user->name : '' }}</figcaption>
			</figure>
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user">
							<b><i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}</b><br>
							<em><i class="fa fa-clock-o"></i> {{ $p->updated ? $p->updated->diffForHumans() : "" }}</em>
						</div>
					</header><br>
					
					<div class="comment-post">

						<div class="row no-gutter">
							@foreach ($p->images as $image)
							@include('forum._list-image')
							@endforeach
							<br />
						</div>

						<p>{!! nl2br($p->description) !!}</p>

					</div>

					<p class="text-right">
						<a href="/post/{{$p->post_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
						<a href="/post/{{$p->post_id}}/delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
					</p>
				</div>
			</div>
		</div>
	</article>
</section>
