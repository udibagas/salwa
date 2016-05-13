<div class="col-md-4">
	<div class="thumbnail" style="height:300px;">
		<a href="/image/{{ $image->id_salwaimages }}-{{ str_slug($image->judul) }}"><img src="http://www.salamdakwah.com/{{ $image->img_images }}" style="width:100%;height:300px;" alt="" class="img-responsive"></a>
		<div class="thumbnail-block"></div>
		<!-- <div class="caption text-center">
			<h4><a href="/image/{{ $image->id_salwaimages }}-{{ str_slug($image->judul) }}">{{ $image->judul }}</a></h4>
			<b>{{ $image->user ? $image->user->name : '' }}</b><br />
			<em>{{ $image->updated->diffForHumans() }}</em>
		</div> -->
	</div>
</div>
