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
				<small>
					{{ $p->time->diffForHumans() }}
					in <a href="/timeline?type={{ $p->type }}&q={{ request('q') }}">{{ ucfirst($p->type) }}</a>
					@if ($p->group_id)
						&bull;
						@if ($p->type == 'kajian')
						<a href="/timeline?type={{ $p->type }}&q={{ request('q') }}&group_id={{ $p->group_id}}">{{ $p->group_id == 1 ? 'Rutin' : 'Pekanan' }}</a>
						@else
						<a href="/timeline?type={{ $p->type }}&q={{ request('q') }}&group_id={{ $p->group_id}}">{{ $p->group }}</a>
						@endif
					@endif
				</small>
			</div>
		</div>
	</div>

	<h4>{{ $p->title }}</h4>

	@if ($p->img)
		<br>
		<img src="/{{ $p->img }}" alt="" class="img-responsive" />
		<br>
	@endif

	@if ($p->type == 'video' && $p->file)
		<br>
		<iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ $p->file }}" frameborder="0" allowfullscreen></iframe>
		<br>
	@endif

	@if (in_array($p->type, ['audio', 'murottal']) && $p->file)
		<br>
		<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $p->file }}" type="application/ogg"></source></audio>
		<br>
	@endif

	<div class="content">
	@if ($p->type == 'hadist')
		<div style="font-size:22px;margin-top:20px;">
			{!! explode('|||', $p->content)[0] !!}
		</div>
		<br>
		{!! nl2br(str_replace('&nbsp;',' ',strip_tags(explode('|||', $p->content)[1]))) !!}
	@else
		{!! $p->content !!}
	@endif
	</div>




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
