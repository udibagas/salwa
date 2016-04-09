@extends('layouts.main')

@section('content')

<div class="row">
	<div class="col-md-7">
		<h1>Hakikat Penciptaan Langit dan Bumi</h1><hr style="border-color:#FF4E00;" />
		<iframe width="650" height="340" src="https://www.youtube.com/embed/06HMM2CNSwA" frameborder="0" allowfullscreen></iframe>
	</div>

	<div class="col-md-5">
		<h4 class="title">VIDEO TERKAIT</h4>
		<div class="row">
			@for ($i=0;$i<=3;$i++)
			<div class="col-md-6">
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
</div>



@stop
