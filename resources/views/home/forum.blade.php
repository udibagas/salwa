<h4 class="title">FORUM</h4>
<div class="alert alert-info">
	@foreach ($forum as $f)
		<b><a href="/forum/show">{{ $f->title }}</a></b><br />
		{{ $f->user ? $f->user->name : '' }} | {{ $f->updated->diffForHumans() }}<br /><br />
	@endforeach
</div>
