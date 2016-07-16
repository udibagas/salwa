@extends('quran.mobile.main')

@section('content')

	<h4 class="title text-center">
		{{ $surah->nama }}/{{ $surah->arab }} ({{ $surah->arti }})<br />
		<small style="color:#fff;">{{ $surah->ayat }} Ayat - {{ $surah->jenis }}</small>
	</h4>
	<div id="post-list">
		@each('quran.mobile._ayat', $ayats, 'a')
	</div>

@stop
