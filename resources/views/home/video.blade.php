<h4 class="title">VIDEO</h4>

<div class="row">
	@foreach ($videos as $v)
		@include('video._list', ['video' => $v])
	@endforeach
</div>

<script type="text/javascript">
$(document).ready(function() {
	$('#media').carousel({
		pause: true,
		interval: false,
	});
});
</script>
