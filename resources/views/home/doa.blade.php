<h4 class="title"><i class="fa fa-heartbeat"></i> DO'A</h4>
<div class="list-group">
	@foreach ($doa as $d)
		<a class="list-group-item" href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
			<i class="fa fa-heartbeat"></i> {{ $d->judul }}
		</a>
	@endforeach
</div>
