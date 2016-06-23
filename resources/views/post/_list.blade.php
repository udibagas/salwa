<div class="panel panel-blue">
	<div class="panel-body">
		<div class="media">
			<div class="media-left media-middle">
				<div style="height:40px;width:40px;">
					@if ($p->user && $p->user->img_user)
					<img class="media-object cover img-circle" src="/{{ $p->user->img_user }}" alt="{{ $p->user->name }}">
					@elseif ($p->user)
					<img class="media-object profile img-circle" data-name="{{ $p->user->name }}" alt="{{ $p->user->name }}" data-height="40" data-width="40">
					@else
					<img class="media-object cover img-circle" src="/images/logo-padding.png" alt="{{ $p->user->name }}">
					@endif
				</div>
			</div>
			<div class="media-body">
				@can('update-post', $p)
				<div class="pull-right">
					{!! Form::open(['url' => '/post/'.$p->post_id, 'method' => 'DELETE']) !!}
					{!! Form::hidden('redirect', url()->current()) !!}
					<a href="/post/{{ $p->post_id }}/edit" class="btn btn-info btn-xs">Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs delete">Delete</button>
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
			<br>

			@if (count($p->images) > 0)
				<div class="row no-gutter">
					@each('post._image', $p->images, 'image')
					<div class="clearfix"></div>
				</div>
				<br>
			@endif

			{!! $p->description !!}
		</div>
	</div>
</div>
