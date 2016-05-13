<div class="col-md-3">
	<div class="thumbnail" style="height:200px;">
		<a href="/peduli/{{ $peduli->peduli_id }}-{{ str_slug($peduli->judul) }}">

			@if ($peduli->img_artikel)
			<img src="http://www.salamdakwah.com/{{ $peduli->img_artikel }}" style="width:100%;height:200px;" alt="">
			@endif
			
			<div class="thumbnail-block">
				<div class="caption">
					<h4>{{ $peduli->judul }}</h4>
					<b>{{ $peduli->user ? $peduli->user->name : '' }}</b><br />
					<em>{{ $peduli->updated->diffForHumans() }}</em>
				</div>
			</div>
		</a>
	</div>
</div>
