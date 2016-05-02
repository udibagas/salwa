<h4 class="sub-title">{{ $group->group_name }}</h4>
<div class="" style="padding:10px 20px;">
	@foreach ($group->forums()->orderBy('updated', 'DESC')->limit(3)->get() as $f)
		<div class="underlined">
			<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
				<h4><i class="fa fa-comments-o"></i>  {{ $f->title }} </h4>
			</a>
			<b>{{ $f->user ? $f->user->name : '' }} | {{ $f->updated->diffForHumans() }}</b>
		</div>
	@endforeach
</div>
