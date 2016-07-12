@extends('layouts.main')

@section('title', 'Salwa Radio')

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA RADIO',
		]
	])

@stop

@section('content')

<div class="text-center" style="padding:100px 0;width:350px;margin:0 auto;">

	<audio controls="controls" preload="none" style="width:100%" autoplay="autoplay"><source src="{!!$radio!!}" type="application/ogg"></source></audio>
	<!-- <div class="fa fa-pause fa-5x text-info" id="btn"></div><br> -->
	<!-- Now Playing :<span id="title"></span> -->
</div>


@endsection

@push('script')

<script type="text/javascript">

		// var audio = new Audio('{!! $radio !!}');
		//
		// $(document).on('click', '.fa-play', function() {
		// 	audio.play();
		// 	$(this).removeClass('fa-play');
		// 	$(this).addClass('fa-pause');
		// });
		//
		// $(document).on('click', '.fa-pause', function() {
		// 	audio.pause();
		// 	$(this).removeClass('fa-pause');
		// 	$(this).addClass('fa-play');
		// });

		// audio.play();

		// $.ajax({
		// 	crossOrigin: true,
		// 	url: '{!! $radio !!}',
		// 	success: function(html) {
		// 		var contentRegex = /<body>(.*)<\/body>/;
		// 		var content = html.match(contentRegex)[1];
		// 		var parts = content.split(',');
		// 		if (parts.length < 7 || !parts[6]) {
		// 			var title = null;
		// 		}
		// 		var title = parts[6];
		//
		// 		$('#title').text(title);
		// 	}
		// });

	</script>

@endpush
