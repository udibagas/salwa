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

				@can('update-post', $p)
				<div class="pull-right">
					{!! Form::open(['url' => '/post/'.$p->post_id, 'method' => 'DELETE']) !!}
					<a href="/post/{{$p->post_id}}/edit" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					{!! Form::hidden('redirect', url()->full()) !!}
					<button name="delete" type="submit" class="btn btn-xs btn-danger delete"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				</div>
				@endcan
			</div>
			<div class="panel-body">

				{!! $p->description !!}

				@if (count($p->images) > 0)
					<br>
					<div class="row no-gutter">
						@each('post._image', $p->images, 'image')
					</div>
					<br>
				@endif

			</div>
		</div>
	</div>
</div>
