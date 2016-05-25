<!-- <h4 class="title">KATEGORI INFORMASI</h4> -->
<div class="well">
	{!! Form::open(['url' => '/informasi', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', request('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Informasi" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
	{!! Form::close() !!}

	<div class="list-group hidden-xs">
		<a href="/informasi?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
			<i class="fa fa-hashtag"></i> Semua Kategori
			<span class="badge">{{ \App\Informasi::count() }}</span>
		</a>
		@foreach (\App\Group::informasi()->orderBy('group_name', 'ASC')->get() as $g)
		<a href="/informasi?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
			<i class="fa fa-hashtag"></i> {{ $g->group_name }}
			<span class="badge">{{ $g->informasis->count() }}</span>
		</a>
		@endforeach
	</div>
</div>
