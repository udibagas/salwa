<h4 class="sub-title"><i class="fa fa-hashtag"></i> {{ $group->group_name }}</h4>
<div class="" style="padding:10px 20px;">
	@foreach ($group->forums()->orderBy('updated', 'DESC')->limit(3)->get() as $f)
		<div class="underlined">
			<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
				<h4><i class="fa fa-comment-o"></i>  {{ $f->title }} </h4>
			</a>
			<em>
				<i class="fa fa-user"></i> {{ $f->user ? $f->user->name : '' }}
				<i class="fa fa-clock-o"></i> {{ $f->updated->diffForHumans() }}
				<i class="fa fa-comments-o"></i> {{ $f->posts->count() }} post{{ $f->posts->count() > 1 ? 's' : '' }}
			</em>
		</div>
	@endforeach
</div>
