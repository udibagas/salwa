@extends('quran.main')

@section('title', 'Quran')

@section('content')

	<br>
	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('quran._surah')
		</div>
		<div class="col-md-6">
			<div class="list-group">
				<!-- <span class="list-group-item info">
					@include('quran._search-form')
				</span> -->
				@include('quran._player')
				@each('quran._ayat', $ayats, 'a')
			</div>

			<div class="text-center">
				{!! $ayats->links() !!}
			</div>
		</div>
		<div class="col-md-3">
			@include('quran._detail-surah')
		</div>
	</div>

@stop
