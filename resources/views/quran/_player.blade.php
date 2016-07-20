<span class="list-group-item text-center info">
	<a href="#" class="btn btn-info btn-sm prev">
		<i class="fa fa-step-backward"></i>
	</a>
	<a href="#" class="btn btn-info btn-lg pause" style="border-radius:11px;">
		<i class="fa fa-pause"></i>
	</a>
	<a href="#" class="btn btn-info btn-lg play" style="border-radius:11px;">
		<i class="fa fa-play"></i>
	</a>
	<a href="#" class="btn btn-info btn-sm next">
		<i class="fa fa-step-forward"></i>
	</a>

	<div class="progress" style="margin:10px 0;height:7px;">
		<div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="10" style="width:0;">
			<span class="sr-only">0%</span>
		</div>
	</div>
	<span class="text-center text-bold text-danger track-title"></span>
</span>

@push('script')
<script type="text/javascript">

	$('.pause').hide();
	$('.track').first().addClass('warning');

	var qari = $('[name="qari"]').val();
	var audioDir = '/quran_audio/'+qari;
	var track = $('.track').first().attr('audiourl');

	$('[name="qari"]').on('change', function() {
		var q = $(this).val();
		audioDir = '/quran_audio/'+q;
		stopAudio();
		initAudio(track);
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

	$('.track').click(function() {
		audio.pause();
		audio = initAudio($(this).attr('audiourl'));
		playAudio(audio, $(this));
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

	$('.pause').click(function(e) {
		e.preventDefault();
		stopAudio();
	});

	var stopAudio = function() {
		audio.pause();
		$('.pause').hide();
		$('.play').show();
		$('.progress-bar').removeClass('active');
	};

	var playAudio = function(a, e) {
		$('.progress-bar').attr('aria-valuemax', a.duration);
		$('.track').removeClass('warning');

		if (e.length) {
			$(e).addClass('warning');
		}

		$('.track-title').html($('.track.warning').attr('audio-title'));
		a.play();

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

		$('.play').hide();
		$('.pause').show();
		track = $('.track.warning').attr('audiourl');
	};

</script>
@endpush
