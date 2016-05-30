<div class="list-group hidden-xs">
	<span class="list-group-item info">
		{!! Form::open(['url' => '/kajian', 'method' => 'GET']) !!}
		{!! Form::hidden('rutin', request('rutin')) !!}
		{!! Form::hidden('ustadz_id', request('ustadz_id')) !!}
			<input type="text" name="tema" value="{{ request('tema') }}" placeholder="Search Kajian" class="form-control search-field">
		{!! Form::close() !!}
	</span>
	<a href="/kajian?tema={{ request('tema') }}&ustadz_id={{ request('ustadz_id') }}" class="list-group-item info @if (request('rutin') == null) active @endif">
		SEMUA KAJIAN
		<span class="badge">{{ \App\Kajian::count() }}</span>
	</a>
	<a href="/kajian?tema={{ request('tema') }}&rutin=tematik&ustadz_id={{ request('ustadz_id') }}" class="list-group-item info @if (request('rutin') == 'tematik') active @endif">
		Kajian Tematik
		<span class="badge">{{ \App\Kajian::tematik()->count() }}</span>
	</a>
	<a href="/kajian?tema={{ request('tema') }}&rutin=rutin&ustadz_id={{ request('ustadz_id') }}" class="list-group-item info @if (request('rutin') == 'rutin') active @endif">
		Kajian Rutin
		<span class="badge">{{ \App\Kajian::rutin()->count() }}</span>
	</a>
</div>

<div class="list-group hidden-xs">
	<a href="kajian?tema={{ request('tema') }}&rutin={{ request('rutin') }}" class="list-group-item info @if (request('ustadz_id') == null) active @endif">
		<i class="fa fa-user"></i> SEMUA USTADZ
	</a>
	@foreach (\App\Ustadz::has('kajians')->orderBy('ustadz_name', 'ASC')->get() as $ustadz)
	<a class="list-group-item info @if (request('ustadz_id') == $ustadz->ustadz_id) active @endif" href="/kajian?tema={{ request('tema') }}&rutin={{ request('rutin') }}&ustadz_id={{ $ustadz->ustadz_id }}">
		<i class="fa fa-user"></i> {{ $ustadz->ustadz_name }}
	</a>
	@endforeach
</div>
