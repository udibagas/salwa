<!-- <h4 class="title">KATEGORI PRODUK</h4> -->
<div class="well">
	{!! Form::open(['url' => '/produk', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', request('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Produk" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
	{!! Form::close() !!}

	<div class="list-group hidden-xs">
		<a href="/produk?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
			<i class="fa fa-hashtag"></i> Semua Kategori
			<span class="badge">{{ \App\Produk::count() }}</span>
		</a>
		@foreach (\App\Group::produk()->orderBy('group_name', 'ASC')->get() as $g)
		<a href="/produk?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
			<i class="fa fa-hashtag"></i> {{ $g->group_name }}
			<span class="badge">{{ $g->produks->count() }}</span>
		</a>
		@endforeach
	</div>
</div>
