<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th><input type="checkbox" name="" value="" class="select-all"></th>
			<th>#</th>
			<th>Judul</th>
			<th>User</th>
			<th>Kategori</th>
			<th>Close</th>
			<th style="width:150px;">Created At</th>
			<!-- <th style="width:150px;">Updated At</th> -->
			<th>Action</th>
		</tr>
		{!! Form::open(['method' => 'GET']) !!}
		<tr>
			<td></td>
			<td></td>
			<td>
				<input type="text" name="title" value="{{ request('title') }}" placeholder="Title" class="form-control">
			</td>
			<td>
				<input type="text" name="user" value="{{ request('user') }}" placeholder="User" class="form-control">
			</td>
			<td>
				{{ Form::select('group_id',
					\App\Group::active()->forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
					request('group_id'), [
						'class' => 'form-control',
						'placeholder' => '-- All --'
					]
				) }}
			</td>
			<td>
				{{ Form::select('close',
					['Y' => 'Y', 'N' => 'N'],
					request('close'), [
						'class' => 'form-control',
						'placeholder' => '-All-'
					]
				) }}
			</td>
			<td> </td>
			<!-- <td> </td> -->
			<td style="padding-top:10px;" class="text-right">
				<button type="submit" name="submit" class="btn btn-xs btn-info search"><i class="fa fa-filter"></i></button>
				<a href="/forum/admin" class="btn btn-xs btn-info refresh"><i class="fa fa-refresh"></i></a>
			</td>
		</tr>
		{!! Form::close() !!}
	</thead>
	<tbody>
		<?php $i = $forums->firstItem(); ?>
		@foreach ($forums as $a)
			<tr class="@if ($a->status == 'b') danger @endif">
				<td><input type="checkbox" name="id" value="{{ $a->forum_id }}"></td>
				<td>{{ $i++ }}</td>
				<td><a href="/post/?forum_id={{ $a->forum_id }}">{{ $a->title }}</a></td>
				<td>{{ $a->user ? $a->user->name : '' }}</td>
				<td>{{ $a->group ? $a->group->group_name : '' }}</td>
				<td>{{ $a->close }}</td>
				<td>{{ $a->created->diffForHumans() }}</td>
				<!-- <td>{{ $a->updated }}</td> -->
				<td class="text-right">
					{!! Form::open(['method' => 'DELETE', 'url' => '/forum/'.$a->forum_id]) !!}
						{!! Form::hidden('redirect', url()->full()) !!}
						<a href="/forum/{{ $a->forum_id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> EDIT</a>
						<!-- <button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Delete</button> -->
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
