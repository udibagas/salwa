<li class="list-group-item">
	<div class="media">
		<div class="media-left">
			@if ($f->user && $f->user->img_user)
			<div style="width:40px;height:40px;">
				<img class="img-circle media-object cover" src="/{{ $f->user->img_user }}" />
			</div>
			@else
			<img class="img-circle profile media-object" data-name="{{ $f->title }}" data-width="40" data-height="40" data-font-size="17" />
			@endif
		</div>
		<div class="media-body">
			<a href="{{ $f->url }}">
				<strong>{{ $f->title }} </strong>
			</a>
			<div class="text-muted">
				{{ $f->user ? $f->user->name.' - ' : '' }}
				{{ $f->updated->diffForHumans() }}
			</div>
		</div>
	</div>
</li>
