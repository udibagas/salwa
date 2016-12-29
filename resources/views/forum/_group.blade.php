<div class="panel panel-default">
	<div class="list-group" id="sidr-right">
		<span class="list-group-item">
			{!! Form::open(['url' => '/forum/search', 'method' => 'GET']) !!}
			{!! Form::hidden('user_id', request('user_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Forum" class="form-control search-field">

			@if ($group)
			{!! Form::hidden('group_id', $group->group_id) !!}
			@endif

			{!! Form::close() !!}
		</span>
		<a class="list-group-item" href="/forum/create"><i class="fa fa-plus"></i> BUAT THREAD BARU</a>
		@if (auth()->check())
		<a href="/forum/search?user_id={{ auth()->user()->user_id }}" class="list-group-item @if (request('user_id') == auth()->user()->user_id) active @endif">FORUM SAYA</a>
		@endif
		<a href="/forum" class="list-group-item @if ($group == null) active @endif">SEMUA FORUM</a>
		@foreach (\App\Group::forum()->active()->orderBy('group_name', 'ASC')->get() as $g)
		<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}" class="list-group-item @if (isset($group) && $g->group_id == $group->group_id) active @endif">
			{{ $g->group_name }}
			<span class="badge">{{ $g->forums()->active()->count() }}</span>
		</a>
		@endforeach
	</div>
</div>
