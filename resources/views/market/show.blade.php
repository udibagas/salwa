@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">SALWA MARKET</a>
			<a href="#" class="btn btn-info">Flash Card Huruf Hijaiyah</a>
		</div>
	</div>

@stop

@section('content')

<h1>Flash Card Huruf Hijaiyah</h1><hr />
<div class="row">
	<div class="col-md-8">

		<div class="row">
			<div class="col-md-6">
				<img src="/images/flash.jpg" style="width:100%;margin-bottom:30px;" alt="" />
			</div>
			<div class="col-md-6">
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<table class="table table-hover table-striped">
					<tbody>
						<tr>
							<th>Seller</th>
							<td>: Zahra Publishing House</td>
						</tr>
						<tr>
							<th>Harga</th>
							<td>: Rp. 52.000,-</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<hr>
		Share:
		<div class="btn-group">
			<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
		</div>
		<hr>

		<h4 class="title">PRODUK TERKAIT</h4>
		<div class="row">
			@for ($i=0;$i<=2;$i++)
			<div class="col-md-4">
				<div class="thumbnail">
					<a href="#"><img src="/images/flash.jpg" style="width:100%" alt=""></a>
					<div class="caption">
						<h4><a href="#">Flash Card Huruf Hijaiyah</a></h4>
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
