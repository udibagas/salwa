<h4 class="title">SALWA INFO</h4>
<ul class="list-group">
	@foreach ($info as $i)
	<li class="list-group-item">
		<a href="/informasi/{{ $i->informasi_id }}-{{ str_slug($i->judul) }}">
			{{ $i->judul }}
		</a>
		<br>
		<em>{{ $i->updated->diffForHumans() }}</em>
	</li>
	@endforeach
</ul>
