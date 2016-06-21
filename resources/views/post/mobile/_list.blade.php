<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:40px;width:40px;">
				@if ($p->user && $p->user->img_user)
				<img class="media-object cover" src="/{{ $p->user->img_user }}" alt="{{ $p->user->name }}">
				@elseif ($p->user)
				<img class="media-object profile" data-name="{{ $p->user->name }}" alt="{{ $p->user->name }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="{{ $p->user->name }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<strong>
				{{ $p->user ? $p->user->name : '' }}
			</strong><br>
			<span class="text-muted">
				{{ $p->created->diffForHumans() }}
			</span>
		</div>

		<br>

		{!! $p->description !!}
	</div>
</div>

@if (count($p->images) > 0)
<div class="row-post no-gutter">
	@each('post._image', $p->images, 'image')
	<div class="clearfix"></div>
</div>
@endif
