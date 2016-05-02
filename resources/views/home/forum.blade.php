<h4 class="title">FORUM</h4>
<div class="alert alert-info">
	@foreach ($forum as $f)
		<p>
			<b><a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">{{ $f->title }}</a></b><br />
			{{ $f->user ? $f->user->name : '' }} | {{ $f->updated->diffForHumans() }}
		</p>
	@endforeach
</div>
