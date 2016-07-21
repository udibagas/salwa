@extends('quran.main')

@section('title', 'Quran')

@section('content')

	<br>
	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('quran._surah')
		</div>
		<div class="col-md-9">
			<!-- <span class="list-group-item info">
				include('quran._search-form')
			</span> -->
			@include('quran._player')

			<div class="list-group" style="height:400px;overflow-x:hidden;overflow-y:auto;" id="ayat-container">
				@each('quran._ayat', $ayats, 'a')
			</div>

			<div class="text-center">
				{!! $ayats->links() !!}
			</div>
		</div>
		<!-- <div class="col-md-3">
			@include('quran._detail-surah')
		</div> -->
	</div>

@stop
