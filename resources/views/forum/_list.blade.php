<div class="panel panel-blue">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $group->group_name }}</h3>
	</div>
	<ul class="list-group">

		@if (count($group->forums) == 0)
		<li class="list-group-item text-center"><strong>Belum ada thread.</strong></li>
		@endif

		@foreach ($group->forums()->active()->orderBy('created', 'DESC')->limit(5)->get() as $f)
		<li class="list-group-item">
			<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
				<strong>{{ $f->title }} </strong>
			</a><br>
			<i class="fa fa-user"></i> {{ $f->user ? $f->user->name : '' }}
			<i class="fa fa-clock-o"></i> {{ $f->updated->diffForHumans() }}
		</li>
		@endforeach
	</ul>
</div>
