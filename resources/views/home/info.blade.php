<h4 class="title">SALWA INFO</h4>
@foreach ($informasi as $i)
<p>
	<a href="/info/show"><h4 class="media-heading">{{ $i->judul }}</h4></a>
	<em>{{ $i->updated->diffForHumans() }}</em>
</p>
@endforeach
