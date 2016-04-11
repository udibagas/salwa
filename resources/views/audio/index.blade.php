@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">AUDIO</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">SALWA AUDIO</h1>

	<div class="row">
		<div class="col-md-8">
			<table class="table table-hover table-striped">
				<tbody>
					@for ($i=0;$i<=17;$i++)
					<tr>
						<td>
							<h4>Ustadz Yazid - Apakah Syiah Keluar dari Islam?</h4>
						</td>
						<td>
							<a href="#" class="btn btn-orange"><span class="fa fa-play"></span> Play</a>
							<a href="#" class="btn btn-orange"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endfor
				</tbody>
			</table>

			<hr>
			<nav class="text-center">
				<ul class="pagination">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
