<h4 class="title">KATEGORI INFORMASI</h4>
{!! Form::open(['url' => '/informasi', 'method' => 'GET']) !!}
	{!! Form::hidden('group_id', Request::get('group_id')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search Informasi" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/informasi?search={{ Request::get('search') }}" class="list-group-item @if (Request::get('group_id') == null) active @endif">
		<i class="fa fa-hashtag"></i> Semua Kategori
	</a>
	@foreach (\App\Group::informasi()->orderBy('group_name', 'ASC')->get() as $g)
	<a href="/informasi?search={{ Request::get('search') }}&group_id={{ $g->group_id }}" class="list-group-item @if (Request::get('group_id') == $g->group_id) active @endif">
		<i class="fa fa-hashtag"></i> {{ $g->group_name }} <span class="pull-right label label-default">{{ $g->informasis->count() }} info</span>
	</a>
	@endforeach
</div>
