<div class="list-group" id="sidr-right">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/murottal', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Murottal" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/murottal?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null) active @endif">
		SEMUA KATEGORI <span class="badge">{{ \App\Murottal::count() }}</span>
	</a>
	@foreach (\App\Group::active()->murottal()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/murottal?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		{{ $g->group_name }} <span class="badge">{{ $g->murottals->count() }}</span>
	</a>
	@endforeach
</div>
