<div class="list-group hidden-xs">
	<span class="list-group-item">
		{!! Form::open(['url' => '/hadist', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
				<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Hadist, Doa, Dzikir" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/hadist?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
		<span class="pull-right badge">{{ \App\Hadist::count() }}</span>
	</a>
	@foreach (\App\Group::hadist()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/hadist?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<span class="pull-right badge">{{ $g->hadists->count() }}</span>
	</a>
	@endforeach
</div>
