@extends('quran.main')

@section('title', 'Quran')

@section('content')

	<div class="row">
		<div class="col-sm-3 col-md-3 col-sm-3 col-md-3 hidden-xs">
			@include('quran._surah')
		</div>
		<div class="col-md-9 col-md-9">
			@include('quran._player')

			<div class="" style="" id="ayat-container">
				@each('quran._ayat', $ayats, 'a')
			</div>

			<div class="text-center">
				{!! $ayats->appends(['q' => request('q')])->links() !!}
			</div>
		</div>
	</div>

@stop
