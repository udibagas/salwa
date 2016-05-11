<ul class="list-group">
	@foreach ($forums as $f)
	<li class="list-group-item">
		<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
			<strong><i class="fa fa-comments-o"></i>  {{ $f->title }} </strong>
		</a><br>
		<em><a href="/forum-category/{{ $f->group_id }}"># {{ $f->group->group_name }}</a> | {{ $f->updated->diffForHumans() }} | {{ $f->posts->count() }} post(s)</em>
	</li>
	@endforeach
</ul>
