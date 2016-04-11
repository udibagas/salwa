@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">SALWA PROMO</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">SALWA PROMO</h1>

	<div class="row">
		<div class="col-md-8">
			<p><a href="/promo/show"><img src="/images/annajm.jpg" alt="" class="img img-responsive img-thumbnail" /></a></p>

			<p><a href="/promo/show"><img src="/images/tokobuku.jpg" alt="" class="img img-responsive img-thumbnail" /></a></p>

			<p><a href="/promo/show"><img src="/images/lugualami.jpg" alt="" class="img img-responsive img-thumbnail" /></a></p>

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
