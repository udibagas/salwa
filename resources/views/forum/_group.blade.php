<div class="well">
	@if (auth()->check())
	<p>
		<a href="/forum/create" class="btn btn-info form-control"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>
	</p>

	@else
	<div class="alert alert-danger text-center">
		Silakan <a href="/login">Login</a> untuk membuat thread.
	</div>
	@endif

	{!! Form::open(['url' => '/forum/search', 'method' => 'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Forum" class="form-control">

			@if ($group)
			{!! Form::hidden('group_id', $group->group_id) !!}
			@endif

			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
	{!! Form::close() !!}

	<div class="list-group">
		<a href="/forum" class="list-group-item @if ($group == null) active @endif"><i class="fa fa-clock-o"></i> Forum Terbaru</a>
		@foreach ($groups as $g)
		<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}" class="list-group-item @if (isset($group) && $g->group_id == $group->group_id) active @endif">
			<i class="fa fa-hashtag"></i> {{ $g->group_name }}
			<span class="badge">{{ $g->forums->count() }}</span>
		</a>
		@endforeach
	</div>
</div>
