<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:40px;width:40px;">
				@if ($p->user && $p->user->img_user)
				<img class="media-object cover" src="/{{ $p->user->img_user }}" alt="{{ $p->user->name }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="">
				@endif
			</div>
		</div>
		<div class="media-body" style="padding-top:10px;">
			<strong>
				{{ $p->user ? $p->user->name : '' }}
			</strong>
			<span class="text-muted">
				{{ $p->created->diffForHumans() }}
			</span>
		</div>
		<hr style="margin-top:5px;">

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
