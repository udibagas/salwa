<div class="list-group" id="sidr-right">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/pertanyaan', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
		{!! Form::hidden('user_id', request('user_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Pertanyaan" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/pertanyaan/create" class="list-group-item info"><i class="fa fa-plus"></i> INPUT PERTANYAAN</a>
	@if (auth()->check())
	<a href="/pertanyaan?search={{ request('search') }}&user_id={{ auth()->user()->user_id }}" class="list-group-item info @if (request('user_id') == auth()->user()->user_id) active @endif">PERTANYAAN SAYA</a>
	@endif
	<a href="/pertanyaan?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null && request('user_id') == null) active @endif">
		SEMUA PERTANYAAN
		<span class="badge">{{ \App\Pertanyaan::count() }}</span>
	</a>
	@foreach (\App\Group::active()->pertanyaan()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/pertanyaan?search={{ request('search') }}&group_id={{ $g->group_id }}&user_id={{ request('user_id') }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		{{ $g->group_name }}
		<span class="badge">{{ $g->pertanyaans->count() }}</span>
	</a>
	@endforeach
</div>
