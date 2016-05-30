<div class="list-group hidden-xs">
	<span class="list-group-item">
		{!! Form::open(['url' => '/image', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Image" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/image?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
		<span class="badge">{{ \App\SalwaImages::count() }}</span>
	</a>
	@foreach (\App\Group::image()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/image?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<span class="badge">{{ $g->images->count() }}</span>
	</a>
	@endforeach
</div>
