<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:60px;width:60px;">
				@if ($a->img_artikel)
				<img class="media-object cover" src="/{{ $a->img_artikel }}" alt="{{ $a->judul }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/artikel/{{ $a->artikel_id }}-{{ $a->kd_judul }}" class="text-bold">{{ $a->judul }}</a>
			<br>
			<small>{{ $a->user ? $a->user->name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
