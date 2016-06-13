<div class="col-md-2 col-sm-3 col-xs-6 gal-item">
	<div class="box">
		<a href="#" data-toggle="modal" data-target="#{{$image->image_id}}">
			<img src="/{{ $image->img_image }}" alt="{{ $image->image_desc }}" />
		</a>
		<div class="modal fade" id="{{$image->image_id}}" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<div class="modal-body">
						<img src="/{{ $image->img_image }}" alt="{{ $image->image_desc }}" />
					</div>
					<div class="col-md-12 description">
						<h4>{{ $image->image_desc }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
