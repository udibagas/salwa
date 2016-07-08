<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="initial-container">
				<img class="media-object img-circle @if ($c->user->img_user) cover @else profile @endif" @if ($c->user->img_user) src="{{ Image::url($c->user->img_user,50,50,['crop']) }}" @else data-name="{{$c->user->name}}" @endif>
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

	<strong>{{ $c->title }}</strong>
	{!! $c->content !!}

</div>
