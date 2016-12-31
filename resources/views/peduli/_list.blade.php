<div class="col-sm-3 col-md-3 col-sm-3 col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="{{ $peduli->url }}">

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
