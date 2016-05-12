<p>
	<a href="/pertanyaan/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Input Pertanyaan</a>
</p>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Judul Pertanyaan</th>
			<th>Ket. Pertanyaan</th>
			<th>Waktu Tanya</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pertanyaans as $p)
		<tr>
			<td>
				<a href="/pertanyaan/{{ $p->pertanyaan_id }}-{{ str_slug($p->judul_pertanyaan) }}">
					<strong>{{ $p->judul_pertanyaan }} </strong>
				</a>
			</td>
			<td>{{ $p->ket_pertanyaan }}</td>
			<td>{{ $p->created->diffForHumans() }}</td>
			<td>
				@if ($p->jawaban)
					<span class="label label-success">Sudah dijawab</span>
				@else
					<span class="label label-warning">Belum dijawab</span>
				@endif
			</td>
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
