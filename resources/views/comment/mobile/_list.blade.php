<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:40px;width:40px;">
				<img class="media-object @if ($c->user->img_user) cover @else profile @endif" @if ($c->user->img_user) src="/{{$c->user->img_user}}" @else data-name="{{$c->user->name}}" @endif>
			</div>
		</div>
		<div class="media-body" style="padding-top:0px;">
			<strong>
				{{ $c->user ? $c->user->name : '' }}
			</strong><br>
			<span class="text-muted">
				{{ $c->created_at->diffForHumans() }}
			</span>
		</div>
	</div>
	<br>

	<strong>{{ $c->title }}</strong>
	{!! $c->content !!}

</div>
