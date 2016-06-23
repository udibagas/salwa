<div class="panel panel-blue">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $group->group_name }}</h3>
	</div>
	<ul class="list-group">
		@foreach ($group->forums()->active()->orderBy('created', 'DESC')->limit(5)->get() as $f)
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
					<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
						<strong>{{ $f->title }} </strong>
					</a>
					<div class="text-muted">
						{{ $f->user ? $f->user->name.' - ' : '' }}
						{{ $f->updated->diffForHumans() }}
					</div>
				</div>
			</div>
		</li>
		@endforeach

		@if (count($group->forums) == 0)
		<li class="list-group-item text-center"><strong>Belum ada thread.</strong></li>
		@endif
	</ul>
</div>
