@if (auth()->check())
<p>
	<a href="/forum/create" class="btn btn-info form-control"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>
</p>

@else
<div class="alert alert-danger text-center">
	Silakan <a href="/login">Login</a> untuk membuat thread.
</div>
@endif



<div class="list-group">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/forum/search', 'method' => 'GET']) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Forum" class="form-control search-field">

			@if ($group)
			{!! Form::hidden('group_id', $group->group_id) !!}
			@endif

		{!! Form::close() !!}
	</span>
	<a href="/forum" class="list-group-item info @if ($group == null) active @endif">FORUM TERBARU</a>
	@foreach ($groups as $g)
	<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}" class="list-group-item info @if (isset($group) && $g->group_id == $group->group_id) active @endif">
		{{ $g->group_name }}
		<span class="badge">{{ $g->forums->count() }}</span>
	</a>
	@endforeach
</div>
