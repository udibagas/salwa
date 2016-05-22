<h4 class="title">KATEGORI KITAB</h4>
{!! Form::open(['url' => '/kitab', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', request('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Kitab" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/kitab?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
		<span class="badge">{{ \App\Buku::count() }}</span>
	</a>
	@foreach (\App\Group::kitab()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/kitab?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<span class="badge">{{ $g->kitabs->count() }}</span>
	</a>
	@endforeach
</div>
