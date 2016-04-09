@extends('layouts.main')

@section('content')

	<h1 class="title">MUROTTAL QURAN</h1>

	<div class="row">
		<div class="col-md-8">
			<table class="table table-hover table-striped">
				<tbody>
					@for ($i=0;$i<=17;$i++)
					<tr>
						<td>
							<h4>001 - Al Fatihah - Misyari Al Afasi</h4>
						</td>
						<td>
							<a href="#" class="btn btn-orange"><span class="fa fa-play"></span> Play</a>
							<a href="#" class="btn btn-orange"><span class="fa fa-download"></span> Download</a>
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
