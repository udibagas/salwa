<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ strtoupper($group->group_name) }}</h3>
	</div>
	<ul class="list-group">
		@each('forum._item', $group->forums()->active()->orderBy('created', 'DESC')->limit(5)->get(), 'f')
		<li class="list-group-item text-center text-bold">
			<a href="/forum-category/{{ $group->group_id }}-{{ str_slug($group->group_name) }}">MORE</a>
		</li>
		@if (count($group->forums) == 0)
		<li class="list-group-item text-center"><strong>Belum ada thread.</strong></li>
		@endif
	</ul>
</div>
