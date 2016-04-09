@extends('layouts.main')

@section('content')

	<h1 class="title">VIDEO</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="row">
				@for ($i=0;$i<=17;$i++)
				<div class="col-md-4">
					<div class="thumbnail">
						<a href="#"><img src="/images/langitbumi.jpg" style="width:100%" alt=""></a>
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
