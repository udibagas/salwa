<ul class="list-group">
	@foreach ($pertanyaans as $p)
	<li class="list-group-item">
		<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
			<strong><i class="fa fa-question"></i>  {{ $p->judul_pertanyaan }} </strong>
		</a><br>

		@if ($p->jawaban)
			<span class="label label-success">Sudah dijawab</span>
		@else
			<span class="label label-danger">Belum dijawab</span>
		@endif

		<em>{{ $p->created->diffForHumans() }}</em>
	</li>
	@endforeach
</ul>
