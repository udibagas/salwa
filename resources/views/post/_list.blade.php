<div class="panel panel-info">
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
				<strong>
					{{ $p->user ? $p->user->name : '' }}
				</strong><br>
				<span class="text-muted">
					{{ $p-> created ? $p->created->diffForHumans() : '' }}
				</span>
			</div>
			<br>

			@if (count($p->images) > 0)
				<br>
				<div class="row no-gutter">
					@each('post._image', $p->images, 'image')
					<div class="clearfix"></div>
				</div>
			@endif

			{!! $p->description !!}
		</div>
	</div>
</div>
