<div class="list-group" id="sidr-right">
	<span class="list-group-item">
		{!! Form::open(['url' => '/artikel', 'method' => 'GET']) !!}
			{!! Form::hidden('group_id', request('group_id')) !!}
				<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Artikel" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/artikel?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null) active @endif">
		SEMUA KATEGORI
		<span class="badge">{{ \App\Artikel::count() }}</span>
	</a>
	@foreach (\App\Group::active()->artikel()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/artikel?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		{{ $g->group_name }}
		<span class="badge">{{ $g->artikels->count() }}</span>
	</a>
	@endforeach
</div>
