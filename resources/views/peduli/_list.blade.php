<div class="col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/peduli/{{ $peduli->peduli_id }}-{{ str_slug($peduli->judul) }}"><img src="http://www.salamdakwah.com/{{ $peduli->img_artikel }}" style="width:100%;height:200px;" alt="">
			<div class="caption">
				<h4>{{ $peduli->judul }}</h4>
				<b>{{ $peduli->user ? $peduli->user->name : '' }}</b><br />
				<em>{{ $peduli->updated->diffForHumans() }}</em>
			</div>
		</a>
	</div>
</div>
