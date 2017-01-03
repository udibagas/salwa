@if ($forums->total() == 0)
<li class="list-group-item text-center">Tidak ada forum</li>
@endif

@foreach ($forums as $f)
<li class="list-group-item @if ($f->status == 'b') disabled @endif">
	<div class="pull-right">
		@if ($f->status == 'b')
		<a href="/forum/activate?selection[]={{ $f->forum_id }}&redirect={{ url()->full() }}" class="confirm">Activate</a> &bull;
		@else
		<a href="/forum/deactivate?selection[]={{ $f->forum_id }}&redirect={{ url()->full() }}" class="confirm">Deactivate</a> &bull;
		@endif

		@if ($f->close == 'N')
		<a href="/forum/close?selection[]={{ $f->forum_id }}&redirect={{ url()->full() }}" class="confirm">Close</a> &bull;
		@else
		<a href="/forum/open?selection[]={{ $f->forum_id }}&redirect={{ url()->full() }}" class="confirm">Open</a> &bull;
		@endif

		<a href="/forum/{{ $f->forum_id }}/edit">Edit</a> &bull;
		<a href="/forum/delete?selection[]={{ $f->forum_id }}&redirect=/forum/admin?page={{ $forums->currentPage() }}" class="confirm">Hapus</a>
	</div>
	<input type="checkbox" name="id" value="{{ $f->forum_id }}">
	<a href="/forum-category/{{ $f->forum_id }}-{{ str_slug($f->title) }}" class="text-bold">[{{ $f->group->group_name }}]</a>
	<a href="/post?forum_id={{ $f->forum_id }}" class="text-bold">
		{{ str_limit($f->title, 100) }}
	</a><br>

	<a href="{{ $f->user->url }}">{{ $f->user->name }}</a> &bull;
	{{ $f->posts()->count() }} komentar &bull;
	{{ $f->created->diffFOrHumans() }}
</li>
@endforeach
