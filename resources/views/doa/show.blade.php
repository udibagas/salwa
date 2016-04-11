@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">DO'A</a>
			<a href="#" class="btn btn-info">Doa Agar Jiwa Bertaqwa dan Berlindung dari Ilmu yang Tidak Bermanfaat</a>
		</div>
	</div>

@stop

@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Doa Agar Jiwa Bertaqwa dan Berlindung dari Ilmu yang Tidak Bermanfaat</h1><hr />

		<div class="text-right" style="font-size:30px;">

			اللهُمَّ آتِ نَفْسِي تَقْوَاهَا، وَزَكِّهَا أَنْتَ خَيْرُ مَنْ زَكَّاهَا، أَنْتَ وَلِيُّهَا وَمَوْلَاهَا، اللهُمَّ إِنِّي أَعُوذُ بِكَ مِنْ عِلْمٍ لَا يَنْفَعُ، وَمِنْ قَلْبٍ لَا يَخْشَعُ، وَمِنْ نَفْسٍ لَا تَشْبَعُ، وَمِنْ دَعْوَةٍ لَا يُسْتَجَابُ لَهَا
		</div>
		<br />
		<em>
			Ya Allah karuniakan ketakwaan pada jiwaku. Sucikanlah ia, sesungguhnya Engkaulah sebaik-baik yang mensucikannya, Engkau-lah Yang Menjaga serta Melindunginya. Ya Allah, aku berlindung kepada-Mu dari Ilmu yang tidak manfaat, hati yang tidak khusyu, dan doa yang tidak diijabahi. (HR. Muslim 2722).
		</em>

		<hr>

		Share:
		<div class="btn-group">
			<a href="#" class="btn btn-warning"><i class="fa fa-facebook"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-twitter"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-google"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-envelope"></i></a>
			<a href="#" class="btn btn-warning"><i class="fa fa-whatsapp"></i></a>
		</div>

	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
