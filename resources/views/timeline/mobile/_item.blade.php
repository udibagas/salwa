<div class="row-post">
	<div class="media">
		<div class="media-left">
			@if ($p->img_user)
				<div class="" style="width:40px;width;40px;">
					<img class="media-object img-circle cover" src="/{{ $p->img_user }}" style="border:1px solid #ccc;" />
				</div>
			@else
				<img class="media-object img-circle profile" data-name="{{ $p->user }}" />
			@endif
		</div>
		<div class="media-body">
			<strong>{{ $p->user }}</strong>
			<div class="text-muted">
				{{ $p->time->diffForHumans() }}
				in <a href="#">{{ $p->type }}</a>
			</div>
		</div>
	</div>

	<h4>{{ $p->title }}</h4>

	@if ($p->img)
		<img src="/{{ $p->img }}" alt="" class="img-responsive" />
	@endif

	@if ($p->type == 'video' && $p->file)
		<iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $p->file }}" frameborder="0" allowfullscreen></iframe>
	@endif

	@if (in_array($p->type, ['audio', 'murottal']) && $p->file)
		<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $p->file }}" type="application/ogg"></source></audio>
	@endif

	<p>{!! nl2br(str_limit(strip_tags($p->content), 200)) !!}</p>

</div>
<div class="row-post">
	<div class="col-xs-4">
		<a href="#">5 <i class="fa fa-heart"></i></a>
	</div>
	<div class="col-xs-4  text-center">
		<a href="#">10 <i class="fa fa-comments"></i></a>
	</div>
	<div class="col-xs-4  text-right">
		<a href="#">65 <i class="fa fa-share-alt"></i></a>
	</div>

	<div class="clearfix">

	</div>
</div>
<br>
