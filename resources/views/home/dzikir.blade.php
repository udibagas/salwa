<h4 class="title"><i class="fa fa-hand-stop-o"></i> DZIKIR</h4>
<ul class="list-group">
	@foreach ($dzikir as $d)
	<li class="list-group-item">
		<a href="/hadist/{{ $d->hadist_id }}-{{ str_slug($d->judul) }}">
			<i class="fa fa-hand-stop-o"></i> {{ $d->judul }}
		</a>
	</li>
	@endforeach
</ul>
