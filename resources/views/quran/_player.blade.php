<span class="list-group-item text-center info">
	<a href="#" class="btn btn-info btn-sm prev">
		<i class="fa fa-step-backward"></i>
	</a>
	<a href="#" class="btn btn-info btn-lg pause" style="border-radius:11px;">
		<i class="fa fa-pause"></i>
	</a>
	<a href="/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3" class="btn btn-info btn-lg play" style="border-radius:11px;">
		<i class="fa fa-play"></i>
	</a>
	<a href="#" class="btn btn-info btn-sm next">
		<i class="fa fa-step-forward"></i>
	</a>
</span>

<span class="list-group-item text-danger track-title"></span>

@push('script')

<script type="text/javascript">

	// hide pause and stop at the beginning
	$('.pause').hide();

	var audio = new Audio('/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3');

	$('.track').first().addClass('info');
	$('.track-title').html($('.track.info').html());

	$('.play').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio.play();
		$(this).hide();
		$('.pause').show();
	});

	$('.track').click(function(e) {
		// e.preventDefault();
		audio.pause();
		audio = new Audio($(this).attr('audiourl'));
		$('.track').removeClass('info');
		$(this).addClass('info');
		$('.track-title').html($('.track.info').html());
		audio.play();

		$('.play').hide();
		$('.pause').show();
	});

	$('.pause').click(function(e) {
		e.preventDefault();
		audio.pause();
		$(this).hide();
		$('.play').show();
	});

	$('.next').click(function(e) {
		e.preventDefault();
		var next = $('.track.info').next();

		if (next.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(next).attr('audiourl'));
		$('.track-title').html($(next).html());
		$('.track').removeClass('info');
		next.addClass('info');
		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

	$('.prev').click(function(e) {
		e.preventDefault();
		var prev = $('.track.info').prev('.track');

		if (prev.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(prev).attr('audiourl'));
		$('.track-title').html($(prev).html());
		$('.track').removeClass('info');
		prev.addClass('info');
		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

</script>

@endpush
