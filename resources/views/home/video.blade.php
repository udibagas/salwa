<h4 class="title">VIDEO</h4>

<div class="row">
	@foreach ($videos as $v)
		@include('video._list', ['video' => $v])
	@endforeach
</div>
