<h4 class="title">VIDEO</h4>

<div class="row">
	@foreach ($videos as $v)
	<div class="col-md-4">
		<div class="thumbnail">
			<a href="/video/show"><img src="http://www.salamdakwah.com/{{ $v->img_video }}" style="width:100%" alt=""></a>
			<div class="caption">
				<h4><a href="/video/show">{{ $v->title }}</a></h4>
				<b>{{ $v->user->name }}</b><br />
				<em>{{ $v->updated->diffForHumans() }}</em>
			</div>
		</div>
	</div>
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
