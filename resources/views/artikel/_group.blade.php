<h4 class="title">KATEGORI ARTIKEL</h4>
{!! Form::open(['url' => '/artikel', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', Request::get('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search Artikel" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/artikel?search={{ Request::get('search') }}" class="list-group-item @if (Request::get('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
	</a>
	@foreach (\App\Group::artikel()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/artikel?search={{ Request::get('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (Request::get('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }}
		<!-- <span class="pull-right label label-default">{{ $g->artikels->count() }} artikel</span> -->
	</a>
	@endforeach
</div>
