<h4 class="title">TANYA USTADZ</h4>
<div class="alert alert-info">
@foreach ($pertanyaan as $p)
	<p>
		<b><a href="/tanya/show">{{ $p->judul_pertanyaan }}</a></b><br />
		{{ $p->user ? $p->user->name : '' }} | {{ $p->updated->diffForHumans() }}
	</p>
@endforeach
</div>
