<div class="row-post">
	<div class="media">
		<div class="media-left">
			<div class="thumbnail" style="height:60px;width:60px;">
				@if ($a->img_gambar)
				<img class="media-object cover" src="/{{ $a->img_gambar }}" alt="{{ $a->judul }}">
				@else
				<img class="media-object cover" src="/images/logo-padding.png" alt="{{ $a->judul }}">
				@endif
			</div>
		</div>
		<div class="media-body">
			<a href="/peduli/{{ $a->peduli_id }}-{{ $a->kd_judul }}" class="text-bold">{{ $a->judul }}</a>
			<br>
			<small>{{ $a->group ? $a->group->group_name.' | ' : '' }} {{ $a->created->diffForHumans() }}</small>
		</div>
	</div>
</div>
