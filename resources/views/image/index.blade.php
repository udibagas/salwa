@extends('layouts.main')

@section('content')

	<h1 class="title">SALWA IMAGE</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@for ($i=0;$i<=17;$i++)
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="#"><img src="/images/image1.jpg" style="width:100%" alt=""></a>
						<div class="caption">
							<h4 class="text-center"><a href="/info/show">Hakikat Penciptaan Langit dan Bumi</a></h4>
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
