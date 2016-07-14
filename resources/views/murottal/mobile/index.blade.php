@extends('layouts.main')

@section('title', 'Murottal')

@section('content')

	@include('murottal.mobile._player')
	<h4 class="title" style="margin-top:55px;">MUROTTAL</h4>
	<div id="post-list">
		@each('murottal.mobile._list', $murottals, 'a')
	</div>

	@if ($murottals->lastPage() > 1)
		<div class="text-center text-bold">
			<br /><img src="/images/loading.png" alt="" class="loading hidden" />
			<a href="{{ $murottals->nextPageUrl() }}" class="next-page">LOAD MORE</a><br><br>
		</div>
	@endif

	@if (auth()->check() && auth()->user()->isAdmin())
	<a href="/murottal/create">@include('layouts.add-btn-mobile')</a>
	@endif

	@include('murottal._group')

@stop

@push('script')

<script type="text/javascript">

	$('.pause').hide();

	var audio = new Audio('{{ $murottals->first()->file_mp3 }}');

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

	var url = '{{ $murottals->nextPageUrl() }}';

</script>

@endpush
