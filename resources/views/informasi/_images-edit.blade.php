<div class="col-md-2 col-xs-6">
	<div class="thumbnail" style="height:100px;">
		<img src="/{{ $image->file_upload }}" alt="" class="cover" /><br/>
	</div>

	<div class="text-center">
		<a href="/informasi/delete-file/{{ $image->file_id}}" class="delete">
			<i class="fa fa-remove"></i> Delete
		</a>
	</div>
	<br>
</div>
