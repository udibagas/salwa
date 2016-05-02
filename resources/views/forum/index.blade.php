@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM'
		]
	])

@stop

@section('content')

	<h1 class="title">FORUM</h1>

	<div class="row">
		<div class="col-md-8">

			<table class="table table-hover table-striped">
				<tbody>
					@foreach ($groups as $g)
					<tr>
						<td>
							<a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}"><img src="http://www.salamdakwah.com/{{ $g->img_group }}" style="height:80px;" alt="" /></a>
						</td>
						<td>
							<h4><a href="/forum-category/{{ $g->group_id }}-{{ str_slug($g->group_name) }}">{{ $g->group_name }}</a></h4>
							<p>
								{{ $g->description }}
							</p>
						</td>
						<td style="width:120px;" class="text-right"><span class="badge">{{ $g->forums->count() }} threads</span></td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
