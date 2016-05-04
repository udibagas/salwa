<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th> Title </th>
			<th> User </th>
			<th> Last Update </th>
			<th> Post(s) </th>
		</tr>
	</thead>
	<tbody>
		@foreach ($forums as $f)
		<tr>
			<td> <b><a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">{{ $f->title }}</a></b> </td>
			<td> <b>{{ $f->user ? $f->user->name : '' }}</b> </td>
			<td> {{ $f->updated->diffForHumans() }} </td>
			<td class="text-right"><span class="badge">{{ $f->posts()->count() }}</span></td>
		</tr>
		@endforeach
	</tbody>
</table>
