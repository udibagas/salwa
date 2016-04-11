@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">SALWA MARKET</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">SALWA MARKET</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@for ($i=0;$i<=11;$i++)
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
