<p>
	<a href="/forum/create" class="btn btn-info"><i class="fa fa-plus-circle"></i> Buat Thread Baru</a>
</p>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Post</th>
			<th>Forum</th>
			<th>Kategori</th>
			<th>Waktu</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $p)
		<tr>
			<td>{{ $p->description }}</td>
			<td>
				<a href="/forum/{{ $p->forum_id }}-{{ str_slug($p->forum->title) }}">
					<strong>{{ $p->forum->title }} </strong>
				</a>
			</td>
			<td>
				<a href="/forum-category/{{ $p->forum->group_id }}-{{ str_slug($p->forum->group->group_name) }}">
					<strong>{{ $p->forum->group->group_name }} </strong>
				</a>
			</td>
			<td>{{ $p->created->diffForHumans() }}</td>
			<td>
				{!! Form::open(['method' => 'DELETE', 'url' => '/post/'.$p->post_id]) !!}
				<a href="/post/{{ $p->post_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
				<button type="submit" name="delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
				{!! Form::close() !!}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
