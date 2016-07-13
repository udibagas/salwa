<div class="list-group" id="playlist">
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

	<span class="list-group-item text-center text-bold track-title"></span>

	@foreach($ayats as $a)
	<a href="/quran_audio/misyari/{{ $a->surat_id }}/{{ $a->ayat_id }}.mp3" class="list-group-item track">Surah {{ $a->surat->nama }} : {{ $a->ayat_id }}</a>
	@endforeach
</div>

@push('script')

<script type="text/javascript">

	// hide pause and stop at the beginning
	$('.pause').hide();

	var audio = new Audio('/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3');

	$('.track').first().addClass('active');
	$('.track-title').text($('.track.active').text());

	$('.play').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio.play();
		$(this).hide();
		$('.pause').show();
	});

	$('.track').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio = new Audio(this.href);
		$('.track').removeClass('active');
		$(this).addClass('active');
		$('.track-title').text($('.track.active').text());
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
		var next = $('.track.active').next();

		if (next.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(next).attr('href'));
		$('.track-title').text($(next).text());
		$('.track').removeClass('active');
		next.addClass('active');
		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

	$('.prev').click(function(e) {
		e.preventDefault();
		var prev = $('.track.active').prev('a');

		if (prev.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(prev).attr('href'));
		$('.track-title').text($(prev).text());
		$('.track').removeClass('active');
		prev.addClass('active');
		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

</script>

@endpush
