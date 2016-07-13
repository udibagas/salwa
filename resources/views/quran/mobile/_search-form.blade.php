<div class="row-post no-gutter info" style="height:55px;position:fixed;top:50px;left:10px;right:10px;z-index:998;">
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
</div>

@push('script')

<script type="text/javascript">

	// hide pause and stop at the beginning
	$('.pause').hide();

	var audio = new Audio('/quran_audio/misyari/{{ $ayats->first()->surat_id }}/{{ $ayats->first()->ayat_id }}.mp3');

	$('.track').first().addClass('warning');
	$('.track-title').html($('.track.warning').html());

	$('.play').click(function(e) {
		e.preventDefault();
		audio.pause();
		audio.play();
		$(this).hide();
		$('.pause').show();
	});

	$(document).on('click', '.track', function() {
		audio.pause();
		audio = new Audio($(this).attr('audiourl'));
		$('.track').removeClass('warning');
		$(this).addClass('warning');

		$('html, body').animate({
	        scrollTop: $(this).offset().top - 105
	    }, 700);

		$('.track-title').html($('.track.warning').html());
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
		var next = $('.track.warning').next();

		if (next.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(next).attr('audiourl'));
		$('.track-title').html($(next).html());
		$('.track').removeClass('warning');
		next.addClass('warning');

		$('html, body').animate({
	        scrollTop: $(".track.warning").offset().top - 105
	    }, 700);

		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

	$('.prev').click(function(e) {
		e.preventDefault();
		var prev = $('.track.warning').prev('.track');

		if (prev.length == 0) {
			return;
		}

		audio.pause();
		audio = new Audio($(prev).attr('audiourl'));
		$('.track-title').html($(prev).html());
		$('.track').removeClass('warning');
		prev.addClass('warning');

		$('html, body').animate({
	        scrollTop: $(".track.warning").offset().top - 105
	    }, 700);

		audio.play();
		$('.play').hide();
		$('.pause').show();
	});

</script>

@endpush
