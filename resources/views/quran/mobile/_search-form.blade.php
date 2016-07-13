<div class="row-post no-gutter info" style="height:66px;position:fixed;top:50px;left:10px;right:10px;z-index:998;">
	<div class="col-xs-8">
		{!! Form::open(['method' => 'GET', 'url' => '/quran']) !!}
		{!! Form::text('q', request('q'), ['class' => 'form-control search-field', 'placeholder' => 'Search']) !!}
		{!! Form::close() !!}
	</div>

	<div class="col-xs-4">
		<div class="text-right" style="margin-top:2px;">
			<a href="#" class="btn btn-info btn-sm prev">
				<i class="fa fa-step-backward"></i>
			</a>
			<a href="#" class="btn btn-info btn-sm pause">
				<i class="fa fa-pause"></i>
			</a>
			<a href="/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3" class="btn btn-info btn-sm play">
				<i class="fa fa-play"></i>
			</a>
			<a href="#" class="btn btn-info btn-sm next">
				<i class="fa fa-step-forward"></i>
			</a>
		</div>
	</div>
	&nbsp;
	<div class="progress" style="margin:-10px 0 0 0;height:3px;">
		<div class="progress-bar progress-bar-striped progress-bar-info active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0;">
			<span class="sr-only">0%</span>
		</div>
	</div>
	<span class="text-center text-bold text-danger track-title"></span>
</div>

@push('script')

<script type="text/javascript">

	// hide pause and stop at the beginning
	$('.pause').hide();

	var audio = new Audio('/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3');

	$('.track').first().addClass('warning');

	$('.play').click(function(e) {
		e.preventDefault();
		audio.pause();
		playAudio(audio, $('.track.warning'));
	});

	$(document).on('click', '.track', function() {
		audio.pause();
		audio = new Audio($(this).attr('audiourl'));
		playAudio(audio, $(this));
	});

	$('.next').click(function(e) {
		e.preventDefault();
		var next = $('.track.warning').next();

		if (next.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(next).attr('audiourl'));
		playAudio(audio, next);
	});

	$('.prev').click(function(e) {
		e.preventDefault();
		var prev = $('.track.warning').prev('.track');

		if (prev.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(prev).attr('audiourl'));
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
		$('.track').removeClass('warning');

		if (e.length) {
			$(e).addClass('warning');
		}

		$('.track-title').html($('.track.warning').attr('audio-title'));

		$('html, body').animate({
	        scrollTop: $(".track.warning").offset().top - 116
	    }, 700);

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
	};

</script>

@endpush
