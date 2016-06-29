@extends('layouts.main')

@section('title', 'Salwa Radio')

@section('content')

<h4 class="title text-center">SALWA RADIO</h4>
<div class="row-post text-center" style="height:100%;">
	<div class="fa fa-pause fa-5x text-info" id="btn"></div><br>
	Now Playing : <span id="title"></span>
</div>

@endsection

@push('script')

<script type="text/javascript">

		var audio = new Audio('{!! $radio !!}');

		$(document).on('click', '.fa-play', function() {
			audio.play();
			$(this).removeClass('fa-play');
			$(this).addClass('fa-pause');
		});

		$(document).on('click', '.fa-pause', function() {
			audio.pause();
			$(this).removeClass('fa-pause');
			$(this).addClass('fa-play');
		});

		audio.play();

		$.ajax({
			crossOrigin: true,
			url: '{!! $radio !!}',
			success: function(html) {
				var contentRegex = /<body>(.*)<\/body>/;
				var content = html.match(contentRegex)[1];
				var parts = content.split(',');
				if (parts.length < 7 || !parts[6]) {
					var title = null;
				}
				var title = parts[6];

				$('#title').text(title);
			}
		});

	</script>

@endpush
