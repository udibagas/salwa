<div class="panel panel-default">
	<div class="panel-body">
		<div class="media">
			<div class="media-left media-middle">
				<div style="height:40px;width:40px;">
					<img class="media-object img-circle @if ($c->user->img_user) cover @else profile @endif" @if ($c->user->img_user) src="/{{$c->user->img_user}}" @else data-name="{{$c->user->name}}" @endif>
				</div>
			</div>
			<div class="media-body">
				<strong>
					{{ $c->user ? $c->user->name : '' }}
				</strong><br>
				<span class="text-muted">
					{{ $c->created_at->diffForHumans() }}
				</span>
			</div>
		</div>
		<br>

		<h4>{{ $c->title }}</h4>
		{!! $c->content !!}
	</div>
</div>
