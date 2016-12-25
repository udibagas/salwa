@extends('layouts.cms')

@section('title', 'Comments')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/comment' => 'COMMENT'
		]
	])

@stop

@section('cms-content')

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-file-text"></i> COMMENTS</h3>
		</div>
		<div class="panel-body">
			<a href="/comment/approve-all" class="delete btn btn-info"><i class="fa fa-check"></i> Approve All Comment</a>

			<span class="pull-right">
				Showing {{ $comments->firstItem() }} to {{ $comments->lastItem() }} of {{ $comments->total() }} entries
			</span>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<!-- <th></th> -->
					<th>Comment</th>
					<th>User</th>
					<th>Type</th>
					<th>Approved</th>
					<th style="width:170px;">Action</th>
				</tr>
				{!! Form::open(['method' => 'GET']) !!}
				<tr>
					<!-- <td></td> -->
					<td>
						<input type="text" name="title" value="{{ request('title') }}" class="form-control" placeholder="Title">
					</td>
					<td>
						<input type="text" name="user" value="{{ request('user') }}" class="form-control" placeholder="User">
					</td>
					<td>
						{!! Form::select('type', \App\Comment::typeList() , request('type'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}
					</td>
					<td>{!! Form::select('approved', ['yes' => 'Yes', 'no' => 'No'] , request('approved'), ['class' => 'form-control', 'placeholder' => '-All-']) !!}</td>
					<td>
						<button type="submit" name="filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
						<a href="/comment" class="btn btn-warning"><i class="fa fa-refresh"></i> Clear</a>
					</td>
				</tr>
				{!! Form::close() !!}
			</thead>
			<tbody>
				<?php $i = $comments->firstItem(); ?>
				@foreach ($comments as $a)
					<tr>
						<!-- <td>{{ $i++ }}</td> -->
						<td>
							<h4 style="margin-top:0;font-weight:bold;">
								<a href="/{{$a->commentable_type}}/{{$a->commentable_id}}#comment-{{$a->id}}" target="_blank">{{ $a->title }}</a>
							</h4>
							{!! $a->content !!}
						</td>
						<td>{{ $a->user ? $a->user->name : '' }}</td>
						<td>{{ $a->commentable_type }}</td>
						<td>{!! $a->approved ? '<b class="text-success">Yes</b>' : '<b class="text-danger">No</b>' !!}</td>
						<td>
							{!! Form::open(['method' => 'DELETE', 'url' => '/comment/'.$a->id]) !!}
							{!! Form::hidden('redirect', url()->full()) !!}
							@if ($a->approved == 0)
							<a href="/comment/{{ $a->id }}/approve" class="btn btn-info btn-xs"><i class="fa fa-check"></i> Approve</a>
							@endif
							<button type="submit" name="delete" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i> Hapus</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		<div class="panel-footer text-center">
			{!! $comments->appends(['title' => request('title'),'user' => request('user'),'type' => request('type'),'approved' => request('approved')])->links() !!}
		</div>
	</div>

@stop
