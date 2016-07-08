<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="initial-container">
				@if ($a->user && $a->user->img_user)
				<img class="media-object cover img-circle" src="{{ Image::url($a->user->img_user,50,50,['crop']) }}" alt="{{ $a->user->name }}">
				@else
				<img class="media-object profile img-circle" data-name="{{ $a->title }}" alt="{{ $a->title }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/forum/{{ $a->forum_id }}-{{ $a->title_code }}" class="text-bold">{{ $a->title }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
