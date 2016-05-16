@extends('layouts.main')

@section('title', 'Salwa Audio')

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
					@foreach ($audios as $m)
					<tr>
						<td>
							<b>{{ $m->judul }}</b>
							<br /><i>{{ $m->updated->diffForHumans() }}</i>
						</td>
						<td style="width:200px;">
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-info fa fa-play"> Play</a>
							<a href="http://www.salamdakwah.com/{{ $m->file_mp3 }}" class="btn btn-info"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

			<nav class="text-center">
				{!! $audios->links() !!}
			</nav>
		</div>

		<div class="col-md-3">
			@include('home.sidebar')
		</div>
	</div>

@stop

@push('script')

	<script type="text/javascript">

		var audio;

		$(document).on('click', '.fa-play', function() {
			audio = new Audio(this.href);
			audio.play();
			$(this).removeClass('fa-play');
			$(this).addClass('fa-stop');
			$(this).text(' Stop');
			return false;
		});

		$(document).on('click', '.fa-stop', function() {
			// var audio = new Audio(this.href);
			audio.stop();
			$(this).removeClass('fa-stop');
			$(this).addClass('fa-play');
			$(this).text(' Play');
			return false;
		});

	</script>

@endpush
