<div class="col-sm-3 col-sm-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/peduli/{{ $peduli->peduli_id }}-{{ str_slug($peduli->judul) }}">

			@if ($peduli->img_artikel)
			<img src="/{{ $peduli->img_artikel }}" alt="">
			@endif

			<div class="thumbnail-block"></div>
			<div class="caption">
				<h4>{{ $peduli->judul }}</h4>
				{{ $peduli->user ? $peduli->user->name : '' }}<br />
				<em>{{ $peduli->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>
