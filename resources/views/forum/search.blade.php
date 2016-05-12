@extends('layouts.main')

@section('title') Forum @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'FORUM',
		]
	])

@stop

@section('content')

	<div class="row">

		<div class="col-md-3">
			@include('forum.list-category')
		</div>

		<div class="col-md-9">

			<h4 class="title"><i class="fa fa-clock-o"></i> HASIL PENCARIAN "{{ Request::get('search') }}"</h4>

			<div class="" style="padding:10px 20px;border:1px solid #8EC7FB;">
				@if (count($forums) == 0)
					<strong>Tidak ada hasil untuk pencarian terkait</strong>
				@endif

				@foreach ($forums as $f)
					<div class="underlined">
						<a href="/forum/{{ $f->forum_id }}-{{ str_slug($f->title) }}">
							<h4><i class="fa fa-comment-o"></i>  {{ $f->title }} </h4>
						</a>
						<em>
							<i class="fa fa-user"></i> {{ $f->user ? $f->user->name : '' }}
							<i class="fa fa-clock-o"></i> {{ $f->updated->diffForHumans() }}
							<i class="fa fa-comments-o"></i> {{ $f->posts->count() }} post{{ $f->posts->count() > 1 ? 's' : '' }}
						</em>
					</div>
				@endforeach
			</div>

			<nav class="text-center">
				{!! $forums->links() !!}
			</nav>

		</div>

		<!-- <div class="col-md-3">
			include('home.sidebar')
		</div> -->

	</div>

@stop
