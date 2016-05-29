<p>
	<a href="/forum/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>
</p>
<hr>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Judul</th>
			<th>Kategori</th>
			<th>Waktu</th>
			<th>Jumlah Post</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($forums as $f)
		<tr>
			<td>
				<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
					{{ $f->title }}
				</a>
			</td>
			<td>
				<a href="/forum-category/{{ $f->group_id }}-{{ str_slug($f->group->group_name) }}">
					{{ $f->group->group_name }}
				</a>
			</td>
			<td>{{ $f->updated->diffForHumans() }}</td>
			<td>{{ $f->posts()->count() }}</td>
			<td>
				@if ($f->close == 'Y')
					-
				@else
					{!! Form::open(['method' => 'DELETE', 'url' => '/forum/'.$f->forum_id]) !!}
					<a href="/forum/{{ $f->forum_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
					{!! Form::close() !!}
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
