<div class="list-group" id="sidr-right">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/forum/search', 'method' => 'GET']) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Forum" class="form-control search-field">

			@if ($group)
			{!! Form::hidden('group_id', $group->group_id) !!}
			@endif

		{!! Form::close() !!}
	</span>
	<a class="list-group-item info" href="/forum/create"><i class="fa fa-plus"></i> BUAT THREAD BARU</a>
	<a href="/forum" class="list-group-item info @if ($group == null) active @endif">SEMUA FORUM</a>
	@foreach ($groups as $g)
	<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}" class="list-group-item info @if (isset($group) && $g->group_id == $group->group_id) active @endif">
		{{ $g->group_name }}
		<span class="badge">{{ $g->forums()->active()->count() }}</span>
	</a>
	@endforeach
</div>
