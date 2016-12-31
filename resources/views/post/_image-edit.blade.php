<div class="col-sm-3 col-sm-3 col-xs-6">
	<div class="thumbnail" style="height:100px;">
		<img src="/{{ $image->img_image }}" alt="{{ $image->image_desc }}" class="cover" /><br/>
	</div>

	<div class="text-center">
		<a href="/post/delete-image/{{ $image->image_id}}?redirect={{ url()->current() }}" class="delete">
			<i class="fa fa-remove"></i> Delete
		</a>
	</div>
	<br>
</div>
