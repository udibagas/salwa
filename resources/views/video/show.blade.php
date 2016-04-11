@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">VIDEO</a>
			<a href="#" class="btn btn-info">Hakikat Penciptaan Langit dan Bumi</a>
		</div>
	</div>

@stop

@section('content')

<h1>Hakikat Penciptaan Langit dan Bumi</h1><hr />
<div class="row">
	<div class="col-md-8">
		<iframe width="748" height="360" src="https://www.youtube.com/embed/06HMM2CNSwA" frameborder="0" allowfullscreen></iframe>

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

		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row">
			@for ($i=0;$i<=2;$i++)
			<div class="col-md-4">
				<div class="thumbnail">
					<img src="/images/langitbumi.jpg" style="width:100%" alt="">
					<div class="caption">
						<h4><a href="/video/show">Hakikat Penciptaan Langit dan Bumi</a></h4>
						<b>Ustadz Abu yahya Badrusalam, Lc</b><br />
						<em>Selasa, 28 Februari 2016</em>
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
