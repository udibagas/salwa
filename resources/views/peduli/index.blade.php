@extends('layouts.main')

@section('content')

	<h1 class="title">SALWA PEDULI</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@for ($i=0;$i<=17;$i++)
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="/peduli/show"><img src="/images/yayasan.jpg" style="width:100%" alt=""></a>
						<div class="caption">
							<h4><a href="/peduli/show">Update Pembangunan Pusat Dakwah</a></h4>
							<em>Selasa, 20 Oktober 2015 18:17</em>
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
