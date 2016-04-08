@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>Hakikat Penciptaan Langit dan Bumi</h1>
		<video style="width:100%" height="300" controls>
			<source src="movie.mp4" type="video/mp4">
			<source src="movie.ogg" type="video/ogg">
			Your browser does not support the video tag.
		</video>
	</div>
	<div class="col-md-3">
		@for ($i=0;$i<=2;$i++)
			<div class="thumbnail">
				<img src="/images/langitbumi.jpg" style="width:100%" alt="">
				<div class="caption">
					<h4><a href="/video/show">Hakikat Penciptaan Langit dan Bumi</a></h4>
					<b>Ustadz Abu yahya Badrusalam, Lc</b><br />
					<em>Selasa, 28 Februari 2016</em>
				</div>
			</div>
		@endfor
	</div>
</div>



@stop
