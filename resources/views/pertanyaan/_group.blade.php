@if (auth()->check())
<p>
	<a href="/pertanyaan/create" class="btn btn-info form-control"><i class="fa fa-plus-circle"></i> Input Pertanyaan</a>
</p>

@else
<div class="alert alert-danger text-center">
	Silakan <a href="/login">Login</a> untuk input pertanyaan.
</div>
@endif

<div class="list-group hidden-xs">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/pertanyaan', 'method' => 'GET']) !!}
		{!! Form::hidden('group_id', request('group_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Pertanyaan" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/pertanyaan?search={{ request('search') }}" class="list-group-item info @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
		<span class="badge">{{ \App\Pertanyaan::count() }}</span>
	</a>
	@foreach (\App\Group::pertanyaan()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/pertanyaan?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item info @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<span class="badge">{{ $g->pertanyaans->count() }}</span>
	</a>
	@endforeach
</div>
