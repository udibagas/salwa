@extends('layouts.main')

@section('title', 'Salwa Audio')

@section('content')

	@include('audio.mobile._player')
	
	<h4 class="title" style="margin-top:55px;">SALWA AUDIO</h4>
	<div id="post-list">
		@each('audio.mobile._list', $audios, 'a')
	</div>

	@if ($audios->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $audios->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@include('audio._group')

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/audio/create">@include('layouts.add-btn-mobile')</a>
	@endif

@stop

@push('script')

<script type="text/javascript">

	$('.pause').hide();

	var audio = new Audio('{{ $audios->count() ? $audios->first()->file_mp3 : '' }}');

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
	};

	var playAudio = function(a, e) {
		$('.track').removeClass('warning');

		if (e.length) {
			$(e).addClass('warning');
		}

		$('html, body').animate({
	        scrollTop: $(".track.warning").offset().top - 105
	    }, 500);

		a.play();
		$('.play').hide();
		$('.pause').show();

		a.addEventListener('timeupdate',function (){
			if (a.ended) {
				stopAudio();
			}
	    });
	};

	var url = '{{ $audios->nextPageUrl() }}';

</script>

@endpush
