@extends('layouts.main')

@section('title', 'Audio Playlist')

@section('content')
<div class="post-row">
	<div class="column add-bottom">
		<div id="mainwrap">
			<div id="nowPlay">
				<span class="left" id="npAction">Paused...</span>
				<span class="right" id="npTitle"></span>
			</div>
			<div id="audiowrap">
				<div id="audio0">
					<audio preload id="audio1" controls="controls">Your browser does not support HTML5 Audio!</audio>
				</div>
				<div id="tracks">
					<a id="btnPrev">&laquo;</a>
					<a id="btnNext">&raquo;</a>
				</div>
			</div>
			<div id="plwrap">
				<ul id="plList">
					<?php $i = 1; ?>
					@foreach ($audios as $a)
					<li>
						<div class="plItem">
							<div class="plNum">{{ $i++ }}</div>
							<div class="plTitle">{{ $a->judul }}</div>
							<div class="plLength">{{ $a->updated->diffForHumans() }}</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection


@push('css')
<link href="/css/playlist.css" rel="stylesheet">
@endpush

@push('script')
<script type="text/javascript">
// html5media enables <video> and <audio> tags in all major browsers
// External File: http://api.html5media.info/1.1.8/html5media.min.js


// Add user agent as an attribute on the <html> tag...
// Inspiration: http://css-tricks.com/ie-10-specific-styles/
var b = document.documentElement;
b.setAttribute('data-useragent', navigator.userAgent);
b.setAttribute('data-platform', navigator.platform);


// HTML5 audio player + playlist controls...
// Inspiration: http://jonhall.info/how_to/create_a_playlist_for_html5_audio
// Mythium Archive: https://archive.org/details/mythium/
jQuery(function ($) {
var supportsAudio = !!document.createElement('audio').canPlayType;
if (supportsAudio) {
	var index = 0,
		playing = false,
		mediaPath = '//archive.org/download/mythium/',
		extension = '',
		tracks = {!! json_encode(\App\Mp3::selectRaw('mp3_download_id as track, judul as name, concat("/", file_mp3) as file')->get(), JSON_UNESCAPED_SLASHES) !!},
		trackCount = tracks.length,
		npAction = $('#npAction'),
		npTitle = $('#npTitle'),
		audio = $('#audio1').bind('play', function () {
			playing = true;
			npAction.text('Now Playing...');
		}).bind('pause', function () {
			playing = false;
			npAction.text('Paused...');
		}).bind('ended', function () {
			npAction.text('Paused...');
			if ((index + 1) < trackCount) {
				index++;
				loadTrack(index);
				audio.play();
			} else {
				audio.pause();
				index = 0;
				loadTrack(index);
			}
		}).get(0),
		btnPrev = $('#btnPrev').click(function () {
			if ((index - 1) > -1) {
				index--;
				loadTrack(index);
				if (playing) {
					audio.play();
				}
			} else {
				audio.pause();
				index = 0;
				loadTrack(index);
			}
		}),
		btnNext = $('#btnNext').click(function () {
			if ((index + 1) < trackCount) {
				index++;
				loadTrack(index);
				if (playing) {
					audio.play();
				}
			} else {
				audio.pause();
				index = 0;
				loadTrack(index);
			}
		}),
		li = $('#plList li').click(function () {
			var id = parseInt($(this).index());
			if (id !== index) {
				playTrack(id);
			}
		}),
		loadTrack = function (id) {
			$('.plSel').removeClass('plSel');
			$('#plList li:eq(' + id + ')').addClass('plSel');
			npTitle.text(tracks[id].name);
			index = id;
			audio.src = mediaPath + tracks[id].file + extension;
		},
		playTrack = function (id) {
			loadTrack(id);
			audio.play();
		};
	extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
	loadTrack(index);
}
});
</script>
@endpush
