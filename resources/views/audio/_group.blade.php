<div class="list-group" id="sidr-right">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/audio', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Audio" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/audio?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null) active @endif">
		SEMUA KATEGORI <span class="badge">{{ App\Mp3::count() }}</span>
	</a>
	@foreach (\App\Group::active()->audio()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/audio?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		{{ $g->group_name }}
		<span class="badge">{{ $g->audios->count() }}</span>
	</a>
	@endforeach
</div>
