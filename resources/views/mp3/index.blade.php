@extends('layouts.main')

@section('title') Audio @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'SALWA AUDIO'
		]
	])

@stop

@section('content')


	<div class="row">
		<div class="col-md-9">
			<h4 class="title"><i class="fa fa-music"></i> SALWA AUDIO</h4>
			<table class="table table-hover table-striped">
				<tbody>
					@foreach ($mp3s as $m)
					<tr>
						<td>
							<b>{{ $m->judul }}</b>
							<br /><i>{{ $m->updated->diffForHumans() }}</i>
						</td>
						<td style="width:200px;">
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-info play"><span class="fa fa-play"></span> Play</a>
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-info"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<nav class="text-center">
				{!! $mp3s->links() !!}
			</nav>
		</div>

		<div class="col-md-3">
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
