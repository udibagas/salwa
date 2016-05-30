<div class="list-group hidden-xs">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/peduli', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Peduli" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/peduli?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
		SEMUA KATEGORI
		<span class="badge">{{ \App\Peduli::count() }}</span>
	</a>
	@foreach (\App\Group::peduli()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/peduli?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		{{ $g->group_name }} <span class="badge">{{ $g->pedulis->count() }}</span>
	</a>
	@endforeach
</div>
