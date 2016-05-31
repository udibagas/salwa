<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			@if ($p->user && $p->user->img_user)
			<img class="img-responsive" src="/{{ $p->user->img_user }}" />
			@else
			<img class="img-responsive" src="/images/nobody.jpg" />
			@endif
		</div>
	</div>
	<div class="col-md-11 col-sm-11">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				<strong>{{ $p->user ? $p->user->name : '' }}</strong>
				<span class="text-muted">posted {{ $p->updated ? $p->updated->diffForHumans() : '' }}</span>
			</div>
			<div class="panel-body">

				{!! nl2br($p->description) !!}

				@if (count($p->images) > 0)
					<div class="row no-gutter">
						@foreach ($p->images as $image)
						@include('forum._list-image')
						@endforeach
					</div>
					<br>
				@endif

				@if (auth()->check() && auth()->user()->user_id == $p->user_id)
				<p class="text-right">
					<a href="/forum/edit-post/{{$p->post_id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					<a href="/forum/delete-post/{{$p->post_id}}/" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i> Hapus</a>
				</p>
				@endif

			</div>
		</div>
	</div>
</div>
