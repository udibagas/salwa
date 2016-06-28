<div class="row-post no-gutter">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:40px;width:40px;">
				@if ($p->user && $p->user->img_user)
				<img class="media-object cover" src="/{{ $p->user->img_user }}" alt="{{ $p->user->name }}">
				@elseif ($p->user)
				<img class="media-object profile" data-name="{{ $p->user->name }}" alt="{{ $p->user->name }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="">
				@endif
			</div>
		</div>
		<div class="media-body">
			@can('update-post', $p)
			<div class="pull-right">
				{!! Form::open(['url' => '/post/'.$p->post_id, 'method' => 'DELETE']) !!}
				{!! Form::hidden('redirect', url()->current()) !!}
				<div class="btn-group">
					<a href="/post/{{ $p->post_id }}/edit" class="btn btn-info btn-xs">Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs delete">Delete</button>
				</div>
				{!! Form::close() !!}
			</div>
			@endcan
			<strong>
				{{ $p->user ? $p->user->name : '' }}
			</strong><br>
			<span class="text-muted">
				{{ $p-> created ? $p->created->diffForHumans() : '' }}
			</span>
		</div>

		@if (count($p->images) > 0)
			<br>
			@each('post._image', $p->images, 'image')
			<div class="clearfix"></div>
		@endif

		<br>

		{!! $p->description !!}
	</div>
</div>
