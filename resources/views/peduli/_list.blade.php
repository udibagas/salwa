<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/peduli/{{ $peduli->peduli_id }}-{{ str_slug($peduli->judul) }}"><img src="http://www.salamdakwah.com/{{ $peduli->img_artikel }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/peduli/{{ $peduli->peduli_id }}-{{ str_slug($peduli->judul) }}">{{ $peduli->judul }}</a></h4>
			<b>{{ $peduli->user ? $peduli->user->name : '' }}</b><br />
			<em>{{ $peduli->updated->diffForHumans() }}</em>
		</div>
	</div>
</div>
