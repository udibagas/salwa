<!-- <div class="text-center">
	<div class="btn-group">
		<a href="#" class="btn btn-info prev">
			<i class="fa fa-step-backward"></i>
		</a>
		<a href="#" class="btn btn-info pause">
			<i class="fa fa-pause"></i>
		</a>
		<a href="#" class="btn btn-info play">
			<i class="fa fa-play"></i>
		</a>
		<a href="#" class="btn btn-info next">
			<i class="fa fa-step-forward"></i>
		</a>
	</div>
	<div class="progress" style="margin:10px 0;height:7px;">
		<div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" style="width:0;">
			<span class="sr-only">0%</span>
		</div>
	</div>
</div> -->

@push('script')
<script type="text/javascript">

	$('.pause, .pause-ayat, .pause-surah').hide();
	$('.track').first().addClass('warning');

	var qari = $('[name="qari"]').val();
	var audioDir = '/quran_audio/'+qari;
	var track = $('.track').first().attr('audiourl');
	var container = $('html, body');

	$('[name="qari"]').on('change', function() {
		qari = $(this).val();
		audioDir = '/quran_audio/'+qari;
		stopAudio();
		audio = initAudio(track);
	});

	$('.download-ayah').click(function(e) {
		e.preventDefault();
		window.location = '/quran/download-ayah-audio?qari='+qari+'&id='+$(this).attr('data-id');
	});

	$('.download-surah').click(function(e) {
		e.preventDefault();
		window.location = '/quran/download-surah-audio?qari='+qari+'&id='+$(this).attr('data-id');
	});

	$('.detail-ayah-btn').click(function(e) {
		e.preventDefault();

		var t = this;
		stopAudio();

		$('.track').removeClass('warning');
		$(this).parent().parent().addClass('warning');

		container.animate({
		    scrollTop: $('.track.warning').offset().top - 70
		});

		$.ajax({
			type: 'GET', url: this.href, dataTyspe: 'html',
			success: function(html) {
				$(t).parent().parent().find('.detail-ayah').html(html);
				audio = initAudio($('.track.warning').attr('audiourl'));
			}
		});
	});

	$('.copy-ayat').click(function(e) {
		e.preventDefault();
		var ayat = $(this).attr('data-copytarget');
		var ayatField = document.querySelector(ayat);
		ayatField.select();
		document.execCommand('copy');
		alert('Ayat & terjemahan berhasil dicopy. Tekan Ctrl+V atau Klik kanan paste.');
	});

	var initAudio = function(t) {
		return new Audio(audioDir+t);
	}

	var audio = initAudio(track);

	$('.play').click(function(e) {
		e.preventDefault();
		audio.pause();
		playAudio(audio, $('.track.warning'));
	});

	$('.track > .ayat, .play-ayat').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio = initAudio($(this).parent().attr('audiourl'));
		playAudio(audio, $(this).parent());
	});

	$('.play-surah').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio = initAudio($(this).attr('audiourl'));
		playAudio(audio, 0);
	});

	$('.next').click(function(e) {
		e.preventDefault();
		var next = $('.track.warning').next();

		if (next.length == 0) {
			return;
		}

		audio.pause();
		audio = initAudio($(next).attr('audiourl'));
		playAudio(audio, next);
	});

	$('.prev').click(function(e) {
		e.preventDefault();
		var prev = $('.track.warning').prev('.track');

		if (prev.length == 0) {
			return;
		}

		audio.pause();
		audio = initAudio($(prev).attr('audiourl'));
		playAudio(audio, prev);
	});

	$('.pause, .pause-ayat, .pause-surah').click(function(e) {
		e.preventDefault();
		stopAudio();
	});

	var stopAudio = function() {
		audio.pause();
		$('.pause, .pause-ayat, .pause-surah').hide();
		$('.play, .play-ayat, .play-surah').show();
		$('.progress-bar').removeClass('active');
	};

	var playAudio = function(a, e) {
		$('.progress-bar').attr('aria-valuemax', a.duration);
		$('.track').removeClass('warning');

		if (e.length) {
			$(e).addClass('warning');
			container.animate({
			    scrollTop: $('.track.warning').offset().top - 70
			});
		}

		$('.track-title').html($('.track.warning').attr('audio-title'));
		a.play();

		$('.play, .play-ayat, .play-surah').hide();
		$('.pause, .pause-ayat, .pause-surah').show();

		var duration = 0;

		a.addEventListener('loadedmetadata', function() {
			duration = parseInt(a.duration, 10);

		});

		a.addEventListener('timeupdate',function (){
			var progress = parseInt(a.currentTime, 10)/duration*100;
			$('.progress-bar').css('width', progress+"%").attr('aria-valuenow', progress);
			if (a.ended) {
				stopAudio();
			}
		});

		track = $('.track.warning').attr('audiourl');
	};

</script>
@endpush
