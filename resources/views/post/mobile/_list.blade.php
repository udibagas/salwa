<div class="row-post no-gutter">
	<div class="media">
		<div class="media-left media-middle">
			<div class="initial-container">
				@if ($p->user && $p->user->img_user)
				<img class="media-object cover img-circle" src="{{ Image::url($p->user->img_user,50,50,['crop']) }}" alt="{{ $p->user->name }}">
				@elseif ($p->user)
				<img class="media-object profile img-circle" data-name="{{ $p->user->name }}" alt="{{ $p->user->name }}">
				@else
				<img class="media-object cover img-circle" src="/images/logo-padding.png" alt="">
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
