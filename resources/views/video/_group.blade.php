<div class="list-group" id="sidr-right">
	<div class="list-group-item info">
		{!! Form::open(['url' => '/video', 'method' => 'GET', 'style' => 'margin-bottom:0;']) !!}
		{!! Form::hidden('user_id', request('user_id')) !!}
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Video" class="form-control search-field">
		{!! Form::close() !!}
	</div>
	<a href="/video?search={{ request('search') }}" class="list-group-item info @if (request('user_id') == null) active @endif">
		SEMUA KATEGORI
		<span class="badge">{{ \App\Video::count() }}</span>
	</a>
	@foreach (\App\User::ustadz()->has('videos')->orderBy('name', 'ASC')->get() as $g)
	<a href="/video?search={{ request('search') }}&user_id={{ $g->user_id }}" class="list-group-item info @if (request('user_id') == $g->user_id) active @endif">
		{{ str_limit($g->name, 30) }}
		<span class="badge">{{ $g->videos->count() }}</span>
	</a>
	@endforeach
</div>
