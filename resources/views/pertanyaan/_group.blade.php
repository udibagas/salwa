<!-- <h4 class="title">KATEGORI PERTANYAAN</h4> -->
<div class="well">
	@if (auth()->check())
	<p>
		<a href="/pertanyaan/create" class="btn btn-info form-control"><i class="fa fa-plus-circle"></i> Input Pertanyaan</a>
	</p>

	@else
	<div class="alert alert-danger text-center">
		Silakan <a href="/login">Login</a> untuk input pertanyaan.
	</div>
	@endif

	{!! Form::open(['url' => '/pertanyaan', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', request('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Pertanyaan" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
	{!! Form::close() !!}

	<div class="list-group hidden-xs">
		<a href="/pertanyaan?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
			<i class="fa fa-hashtag"></i> Semua Kategori
			<span class="badge">{{ \App\Pertanyaan::count() }}</span>
		</a>
		@foreach (\App\Group::pertanyaan()->orderBy('group_name', 'ASC')->get() as $g)
		<a href="/pertanyaan?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
			<i class="fa fa-hashtag"></i> {{ $g->group_name }}
			<span class="badge">{{ $g->pertanyaans->count() }}</span>
		</a>
		@endforeach
	</div>
</div>
