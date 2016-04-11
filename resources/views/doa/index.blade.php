@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">DO'A</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">DO'A</h1>

	<div class="row">
		<div class="col-md-8">
			@for ($i=0;$i<=4;$i++)
				<div class="alert alert-info">
					<a href="/doa/show"><h3>Doa Agar Jiwa Bertaqwa dan Berlindung dari Ilmu yang Tidak Bermanfaat</h3></a>
					<hr>
					<div class="text-right" style="font-size:30px;">

						اللهُمَّ آتِ نَفْسِي تَقْوَاهَا، وَزَكِّهَا أَنْتَ خَيْرُ مَنْ زَكَّاهَا، أَنْتَ وَلِيُّهَا وَمَوْلَاهَا، اللهُمَّ إِنِّي أَعُوذُ بِكَ مِنْ عِلْمٍ لَا يَنْفَعُ، وَمِنْ قَلْبٍ لَا يَخْشَعُ، وَمِنْ نَفْسٍ لَا تَشْبَعُ، وَمِنْ دَعْوَةٍ لَا يُسْتَجَابُ لَهَا
					</div>
					<br />
					<em>
						Ya Allah karuniakan ketakwaan pada jiwaku. Sucikanlah ia, sesungguhnya Engkaulah sebaik-baik yang mensucikannya, Engkau-lah Yang Menjaga serta Melindunginya. Ya Allah, aku berlindung kepada-Mu dari Ilmu yang tidak manfaat, hati yang tidak khusyu, dan doa yang tidak diijabahi. (HR. Muslim 2722).
					</em>
				</div>
			@endfor

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
