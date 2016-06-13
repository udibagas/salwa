<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:40px;width:40px;">
				<img class="media-object cover" @if ($c->user->img_user) src="/{{$c->user->img_user}}" @else src="/images/logo-padding.png" @endif">
			</div>
		</div>
		<div class="media-body" style="padding-top:10px;">
			<strong>
				{{ $c->user ? $c->user->name : '' }}
			</strong>
			<span class="text-muted">
				{{ $c->created_at->diffForHumans() }}
			</span>
		</div>
	</div>

	<hr style="margin:5px 0;">

	<strong>{{ $c->title }}</strong>
	{!! $c->content !!}

</div>
