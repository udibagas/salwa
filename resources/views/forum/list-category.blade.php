<h4 class="title">Forum Category</h4>
<p>
	<a href="/forum/create" class="btn btn-info form-control"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>
</p>

<div class="list-group">
	<a href="/forum" class="list-group-item @if ($group == null) active @endif"><i class="fa fa-clock-o"></i> Forum Terbaru</a>
	@foreach ($groups as $g)
	<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}" class="list-group-item @if (isset($group) && $g->group_id == $group->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
	</a>
	@endforeach
</div>
