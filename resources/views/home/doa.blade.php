<h4 class="title">DO'A</h4>
<ul class="list-group">
	@foreach ($doa as $d)
	<li class="list-group-item">
		<a href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
			<strong><i class="fa fa-heartbeat"></i> {{ $d->judul }}</strong>
		</a>
	</li>
	@endforeach
</ul>
