@extends('layouts.admin')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="/admin" class="btn btn-warning"><i class="fa fa-dashboard"></i></a>
			<a href="/post" class="btn btn-warning">Post</a>
		</div>

		<div class="pull-right">
			<a href="/post/create" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Post</a>
		</div>
	</div>

@stop

@section('content')

	<h1>POSTS</h1><hr>

	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th style="width:250px;">Judul</th>
				<th>Ringkasan</th>
				<th style="width:130px;">Last Update</th>
				<th style="width:70px;">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $post)

				<tr>
					<td> <strong><a href="/post/{{$post->id}}">{{$post->judul}}</a></strong> </td>
					<td> {{str_limit($post->isi, 300)}} </td>
					<td> {{$post->updated_at->diffForHumans()}} </td>
					<td>
						{!! Form::open(['method' => 'DELETE', 'url' => 'post/'.$post->id]) !!}
							<div class="btn-group">

								<a href="/post/{{ $post->id }}/edit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
								<button type="submit" name="submit" class="btn btn-danger btn-xs delete"><i class="fa fa-remove"></i></button>
							</div>
		        		{!! Form::close() !!}
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

	<div class="pull-right">
		<b>{{ $posts->firstItem() }}-{{ $posts->lastItem() }} of {{ $posts->total() }}</b>
	</div>

	{!! $posts->links() !!}

@stop

@section('script')

	<script type="text/javascript">
		$('.delete').click(function() {
			if(confirm('Anda yakin?')) { return true; };
			return false;
		});
	</script>

@stop
