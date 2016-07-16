@extends('quran.mobile.layout')

@section('content')

	<div id="post-list">
		@each('quran.mobile._ayat', $ayats, 'a')
	</div>
@stop
