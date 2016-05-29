<p>
	<a href="/pertanyaan/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Input Pertanyaan</a>
</p>
<hr>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Judul Pertanyaan</th>
			<th>Waktu Tanya</th>
			<th>Status</th>
			<th>Waktu Jawab</th>
			<th>Dijawab Oleh</th>
			<th style="width:130px;">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pertanyaans as $p)
		<tr>
			<td>
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
					{{ $p->judul_pertanyaan }}
				</a>
			</td>
			<td>{{ $p->tgl_tanya ? $p->tgl_tanya->diffForHumans() : '' }}</td>
			<td>
				@if ($p->jawaban)
					<span class="label label-success">Sudah dijawab</span>
				@else
					<span class="label label-warning">Belum dijawab</span>
				@endif
			</td>
			<td>{{ $p->tgl_jawab ? $p->tgl_jawab->diffForHumans() : '' }}</td>
			<td>{{ $p->ustadz ? $p->ustadz->name : '' }}</td>
			<td>
				@if ($p->jawaban)
					-
				@else
					{!! Form::open(['method' => 'DELETE', 'url' => '/pertanyaan/'.$p->pertanyaan_id]) !!}
					<a href="/pertanyaan/{{ $p->pertanyaan_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
