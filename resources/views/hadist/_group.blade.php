<h4 class="title">KATEGORI HADIST</h4>
{!! Form::open(['url' => '/hadist', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', request('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Hadist, Doa, Dzikir" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/hadist?search={{ request('search') }}" class="list-group-item @if (request('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
	</a>
	@foreach (\App\Group::hadist()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/hadist?search={{ request('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (request('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
	</a>
	@endforeach
</div>
