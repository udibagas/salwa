<h4 class="title"><i class="fa fa-hand-stop-o"></i> DZIKIR</h4>
<div class="list-group">
	@foreach ($dzikir as $d)
		<a class="list-group-item" href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
			<i class="fa fa-hand-stop-o"></i> {{ $d->judul }}
		</a>
	@endforeach
</div>
