<h4 class="title">TANYA USTADZ</h4>
@foreach ($pertanyaan as $a)
<div class="row-post">
	<div class="media">
		<div class="media-left media-middle">
			<div class="thumbnail" style="height:60px;width:60px;">
				<img class="media-object cover" src="/images/logo.png" alt="{{ $a->judul_pertanyaan }}">
			</div>
		</div>
		<div class="media-body">
			<a href="/pertanyaan/{{ $a->pertanyaan_id }}-{{ $a->kd_judul }}" class="text-bold">
				{{ str_limit($a->judul_pertanyaan, 55) }}
			</a>
			<br>
			<small>
				{{ $a->user ? $a->user->jenis_kelamin == 'p' ? 'Ikhwan | ' : 'Akhwat | ' : '' }} {{ $a->created->diffForHumans() }}
			</small>
		</div>
	</div>
</div>
@endforeach
