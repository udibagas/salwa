<div class="col-sm-3 col-sm-4 col-xs-6 gal-item">
	<div class="box">
		<a href="#" data-toggle="modal" data-target="#{{$image->file_id}}">
			<img src="/{{ $image->file_upload }}" alt="" />
		</a>
		<div class="modal fade" id="{{$image->file_id}}" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div class="modal-body">
						<img src="/{{ $image->file_upload }}" alt="" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
