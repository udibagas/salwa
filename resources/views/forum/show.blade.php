@extends('layouts.main')

@section('title') Forum : {{ $forum->title }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'/forum-category/'.$forum->group_id.'-'.str_slug($forum->group->group_name) => $forum->group->group_name,
			'#' => $forum->title
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-2">
		@include('forum.list-category', [
			'group' => $forum->group,
			'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get()
		]);
	</div>

	<div class="col-md-7">
		<h1>{{ $forum->title }}</h1><hr />

		@foreach ($posts as $p)

		<section class="comment-list">
			<article class="row">
	            <div class="col-md-2 col-sm-2 hidden-xs">
	              <figure class="thumbnail">
	                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
	                <figcaption class="text-center">{{ $p->user ? $p->user->name : '' }}</figcaption>
	              </figure>
	            </div>
	            <div class="col-md-10 col-sm-10">
	              <div class="panel panel-default arrow left">
	                <div class="panel-body">
	                  <header class="text-left">
	                    <div class="comment-user">
							<b><i class="fa fa-user"></i> {{ $p->user ? $p->user->name : '' }}</b><br>
	                    	<em><i class="fa fa-clock-o"></i> {{ $p->updated ? $p->updated->diffForHumans() : "" }}</em>
						</div>
					</header><br>
	                  <div class="comment-post">
	                    <p>{!! nl2br($p->description) !!}</p>

						<div class="row no-gutter">
							<br />
							@foreach ($p->images as $image)
							<div class="col-md-4 col-sm-12 co-xs-12 gal-item">
								<div class="box">
									<a href="#" data-toggle="modal" data-target="#{{$image->image_id}}">
										<img src="http://www.salamdakwah.com/{{ $image->img_image }}" alt="{{ $image->image_desc }}" />
									</a>
									<div class="modal fade" id="{{$image->image_id}}" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
												<div class="modal-body">
													<img src="http://www.salamdakwah.com/{{ $image->img_image }}" alt="{{ $image->image_desc }}" />
												</div>
												<div class="col-md-12 description">
													<h4>{{ $image->image_desc }}</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach

						</div>

	                  </div>
	                  <!-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p> -->
	                </div>
	              </div>
	            </div>
          </article>
		</section>

		@endforeach

		@if (!Auth::check())

		<article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                <figcaption class="text-center">{ Auth::user()->name }}</figcaption>
              </figure>
            </div>
            <div class="col-md-10 col-sm-10">
					{{ Form::model($model, [
  		  				'enctype' => 'multipart/form-data',
  		  				'method' => 'post',
  		  				'url' => 'forum/comment'
  		  			])
  		  		}}
  		  			{{ Form::hidden('forum_id', $forum->forum_id) }}
  		  			<div class="form-group">
  		  				{{ Form::textarea('description', $model->description, ['class' => 'form-control', 'placeholder' => 'Tulis Komentar']) }}
  		  			</div>
  		  			<button type="submit" name="button" class="btn btn-primary"><span class="fa fa-send"></span> Kirim Komentar</button>

  		  		{{ Form::close() }}
            </div>
          </article>
		  @endif

		<nav class="text-center">
			{{ $posts->links() }}
		</nav>

	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
