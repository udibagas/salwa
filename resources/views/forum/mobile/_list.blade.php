<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:60px;width:60px;">
				@if ($a->user && $a->user->img_user)
				<img class="media-object cover" src="/{{ $a->user->img_user }}" alt="{{ $a->user->name }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/forum/{{ $a->foruml_id }}-{{ $a->title_code }}" class="text-bold">{{ $a->title }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
