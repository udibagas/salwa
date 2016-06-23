<div class="panel panel-blue">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $group->group_name }}</h3>
	</div>
	<ul class="list-group">
		@each('forum._item', $group->forums()->active()->orderBy('created', 'DESC')->limit(5)->get(), 'f')
		@if (count($group->forums) == 0)
		<li class="list-group-item text-center"><strong>Belum ada thread.</strong></li>
		@endif
	</ul>
</div>
