<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th>Post</th>
			<th style="width:150px;">Forum</th>
			<th style="width:100px;">Waktu</th>
			<th style="width:140px;">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($posts as $p)
		<tr>
			<td>
				<a href="/forum/{{ $p->forum_id }}-{{ str_slug($p->forum->title) }}">
					<h5>{{ $p->forum->title }}</h5>
				</a>
				{!! nl2br($p->description) !!}
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
