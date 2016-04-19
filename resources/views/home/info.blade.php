<h4 class="title">SALWA INFO</h4>
@foreach ($info as $i)
<p>
	<a href="/informasi/{{ $i->informasi_id }}-{{ str_slug($i->judul) }}"><h4 class="media-heading">{{ $i->judul }}</h4></a>
	<em>{{ $i->updated->diffForHumans() }}</em>
</p>
@endforeach
