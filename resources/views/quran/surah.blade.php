@extends('layouts.main')

@section('title', 'Quran')

@section('content')

	<br>

	<div class="row">
		<div class="col-md-3 hidden-xs">
			@include('quran._surah')
		</div>
		<div class="col-md-6">

			<div class="list-group">
				<span class="list-group-item info">
					@include('quran._search-form')
				</span>
				@each('quran._ayat', $ayats, 'a')
			</div>

			<div class="text-center">
				{!! $ayats->links() !!}
			</div>
		</div>
		<div class="col-md-3">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">DETAIL SURAT</a></li>
				<li role="presentation"><a href="#2" aria-controls="2" role="tab" data-toggle="tab">KETERANGAN</a></li>
			</ul>

			<br />
			<audio controls="controls" preload="none" style="width:100%"><source src="{{ $surah->audio }}" type="application/ogg"></source></audio>
			<br />
			<br />

			<!-- Tab panes -->
			<div class="tab-content">

				<div role="tabpanel" class="tab-pane active" id="1">
					@include('quran._detail-surah')
				</div>

				<div role="tabpanel" class="tab-pane" id="2">
					{{ $surah->note }}
				</div>

			</div>

		</div>
	</div>

@stop
