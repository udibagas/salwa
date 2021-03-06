<div class="row-post">
	<div class="media">
		<div class="media-left">
			@if ($p->img_user)
				<div class="" style="width:40px;height:40px;">
					<img class="media-object img-circle cover" src="/{{ $p->img_user }}" style="border:1px solid #ccc;" />
				</div>
			@else
				<img class="profile img-circle media-object" data-name="{{ $p->user }}" />
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
						<a href="/timeline?type={{ $p->type }}&q={{ request('q') }}&group_id={{ $p->group_id}}">{{ $p->group }}</a>
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

	@include('timeline.mobile._'.$p->type)

	{!! $p->content !!}


</div>
<!-- <div class="row-post">
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
</div> -->
