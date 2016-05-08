<h4 class="title"><i class="fa fa-video-camera"></i> VIDEO</h4>

<div class="row no-gutter">
	@foreach ($videos as $v)
		@include('video._list', ['video' => $v])
	@endforeach
</div>
