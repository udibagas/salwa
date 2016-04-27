@extends('layouts.main')

@section('title') Murottal @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/murottal' => 'MUROTTAL'
		]
	])

@stop

@section('content')

	<h1 class="title">MUROTTAL QURAN</h1>

	<div class="row">
		<div class="col-md-8">
			<table class="table table-hover table-striped">
				<tbody>
					@foreach ($murottals as $m)
					<tr>
						<td>
							<h4>{{ $m->nama_surat }}</h4>
						</td>
						<td>
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-orange play"><span class="fa fa-play"></span> Play</a>
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-orange"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<hr>
			<nav class="text-center">
				{!! $murottals->links() !!}
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop

@section('script')

	<script type="text/javascript">


		$(document).on('click', '.fa-play', function() {
			var audio = new Audio(this.href);
			audio.play();
			$(this).removeClass('fa-play');
			$(this).addClass('fa-pause');
		});

		$(document).on('click', '.fa-pause', function() {
			var audio = new Audio(this.href);
			audio.pause();
			$(this).removeClass('fa-pause');
			$(this).addClass('fa-play');
		});

		// $('.play').click(function(e) {
		// 	e.preventDefault();
		//
		// 	audio.play();
		// });
	</script>

@stop
