<div class="col-md-4">
	<div class="thumbnail" style="height:300px;">
		<a href="/image/{{ $image->id_salwaimages }}-{{ str_slug($image->judul) }}">
			<div class="thumbnail-block">
				<img src="/{{ $image->img_images }}" style="width:100%;height:300px;" alt="" class="img-responsive">
				<!-- <div class="caption text-center">
					<h4>{{ $image->judul }}</h4>
					<b>{{ $image->user ? $image->user->name : '' }}</b><br />
					<em>{{ $image->updated->diffForHumans() }}</em>
				</div> -->
			</div>
		</a>
	</div>
</div>
