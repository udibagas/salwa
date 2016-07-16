@extends('quran.mobile.main')

@section('content')

	<div id="post-list">
		@each('quran.mobile._ayat', $ayats, 'a')
	</div>
@stop
