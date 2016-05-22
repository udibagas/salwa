<h4 class="title">KATEGORI VIDEO</h4>
{!! Form::open(['url' => '/video', 'method' => 'GET']) !!}
	{!! Form::hidden('user_id', request('user_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Video" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/video?search={{ request('search') }}" class="list-group-item @if (request('user_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> SEMUA KATEGORI
		<span class="badge">{{ \App\Video::count() }}</span>
	</a>
	@foreach (\App\User::ustadz()->has('videos')->orderBy('name', 'ASC')->get() as $g)
	<a href="/video?search={{ request('search') }}&user_id={{ $g->user_id }}" class="list-group-item @if (request('user_id') == $g->user_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->name }}
		<span class="badge">{{ $g->videos->count() }}</span>
	</a>
	@endforeach
</div>
