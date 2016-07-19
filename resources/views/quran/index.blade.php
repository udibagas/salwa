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
				{!! $ayats->appends(['search' => request('search')])->links() !!}
			</div>
		</div>
		<div class="col-md-3">
			<div class="panel panel-blue">
				<div class="panel-heading">
					<h3 class="panel-title">TIPS PENCARIAN</h3>
				</div>
				<div class="panel-body">
					<p>
						Untuk loncat ke surat dan ayat tertentu gunakan pola berikut:
					</p>

					<h4>[surat]:[dari_ayat]-[sampai_ayat]</h4>

					Contoh:<br> <b>2:4-7</b> = Surat ke-2 (Al-Baqarah) dari ayat ke-4 sampai ayat ke-7.
				</div>
			</div>
		</div>
	</div>

@stop
