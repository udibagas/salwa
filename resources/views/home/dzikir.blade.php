<h4 class="title">DZIKIR</h4>
<ul class="list-group">
	@foreach ($dzikir as $d)
	<li class="list-group-item">
		<a href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
			<strong><i class="fa fa-hand-stop-o"></i> {{ $d->judul }}</strong>
		</a>
	</li>
	@endforeach
</ul>
