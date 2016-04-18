<div class="col-md-4">
	<div class="thumbnail" style="height:270px;">
		<a href="/artikel/{{ $artikel->artikel_id }}-{{ str_slug($artikel->judul) }}"><img src="http://www.salamdakwah.com/{{ $artikel->img_artikel }}" style="width:100%;height:120px;" alt=""></a>
		<div class="caption">
			<h4><a href="/artikel/{{ $artikel->artikel_id }}-{{ str_slug($artikel->judul) }}">{{ $artikel->judul }}</a></h4>
			<b>{{ $artikel->user ? $artikel->user->name : '' }}</b><br />
			<em>{{ $artikel->updated->diffForHumans() }}</em>
		</div>
	</div>
</div>
