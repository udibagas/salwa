@extends('layouts.main')

@section('title') Video : {{ $video->title }} @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/video' => 'VIDEO',
			'#' => $video->title
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-3">
		@include('video._group')
	</div>
	<div class="col-md-9">
		<h1>{{ $video->title }}</h1>
		<i class="fa fa-user"></i> {{ $video->user ? $video->user->name : '' }}
		<i class="fa fa-clock-o"></i> {{ $video->updated->diffForHumans() }}
		<hr />

		@if ($video->url_video_youtube)
		<iframe width="600" height="300" src="https://www.youtube.com/embed/{{ $video->url_video_youtube }}" frameborder="0" allowfullscreen></iframe>
		@endif

		@if (count($video->files))
		<div id="video"></div>
		@push('script')
		<script type="text/javascript">

			var playlist = [{file:"/uploads/dirfile_upload/mib_201112191256457757_ubjumatan1AFLV.flv",image:"/uploads/dirimg_file/mib_201111041505263076_1.jpg",title:"Khutbah Jumat - Keutamaan 10 hari bulan Dzulhijjah"},{file:"/uploads/dirfile_upload/mib_201112191256454036_ubjumatan1BFLV.flv",image:"/uploads/dirimg_file/mib_201111041505262181_2.jpg",title:"Khutbah Jumat - Keutamaan 10 hari bulan Dzulhijjah"},{file:"/uploads/dirfile_upload/mib_201112191256455148_ubjumatan1CFLV.flv",image:"/uploads/dirimg_file/mib_201111041505267596_3.jpg",title:"Khutbah Jumat - Keutamaan 10 hari bulan Dzulhijjah"},{file:"/uploads/dirfile_upload/mib_201112191256456719_ubjumatan1DFLV.flv",image:"/uploads/dirimg_file/mib_201111041505268832_4.jpg",title:"Khutbah Jumat - Keutamaan 10 hari bulan Dzulhijjah"}];

			// var playlist = {!! json_encode($video->files()->web()->selectRaw('concat("/",file_upload) as file, img_file as image, "'.$video->title.'" as title')->get(), JSON_UNESCAPED_SLASHES) !!};

			jwplayer("video").setup({
		        playlist: playlist,
				width: 600,
				height: 300
			});

        </script>
		@endpush
		@endif

		<br><br>
		{!! $video->desc !!}

		<hr>
		@include('layouts._share')
		<hr>

		@include('comment.index', [
		'comments' => $video->comments()
			->when((auth()->check() && !auth()->user()->isAdmin()) || auth()->guest(), function($query) {
				return $query->approved();
			})->get()
		])

		@if (auth()->check())
			@include('comment.form', [
				'url' => '/comment', 'method' => 'POST',
				'comment' => new \App\Comment([
					'commentable_id' => $video->video_id,
					'commentable_type' => 'video'
				])
			])
		@else
			<div class="alert alert-danger text-center">
				<strong>Silakan <a href="/login">login</a> untuk menulis komentar.</strong>
			</div>
		@endif

		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row no-gutter">
			@foreach ($terkait as $t)
				@include('video._list', ['video' => $t])
			@endforeach
		</div>
	</div>

</div>

@endsection
