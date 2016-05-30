<div class="list-group hidden-xs">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/banner', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Promo" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/promo?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
		<span class="badge">{{ \App\Banner::count() }}</span>
	</a>
	@foreach (\App\Group::banner()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/promo?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<span class="badge">{{ $g->banners->count() }}</span>
	</a>
	@endforeach
</div>
