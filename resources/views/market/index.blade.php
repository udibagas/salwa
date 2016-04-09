@extends('layouts.main')

@section('content')

	<h1 class="title">SALWA MARKET</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@for ($i=0;$i<=17;$i++)
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="/market/show"><img src="/images/flash.jpg" style="width:100%" alt=""></a>
						<div class="caption">
							<h4><a href="/market/show">Flash Card Huruf Hijaiyah</a></h4>
							<b>Zahra Publishing House</b><br />
							<em>Rp 52.000,-</em>
						</div>
					</div>
				</div>
				@endfor
			</div>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
