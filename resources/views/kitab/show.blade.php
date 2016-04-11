@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">KITAB & TERJEMAHAN</a>
			<a href="#" class="btn btn-info">Sifat Shalat Nabi</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">Sifat Shalat Nabi</h1>

	<div class="row">
		<div class="col-md-8">
			<div class="media">
				<div class="media-left">
					<a href="#">
						<img class="media-object" src="/images/bukushalat.jpg" alt="...">
					</a>
				</div>
				<div class="media-body">
					<h3 class="media-heading">Sifat Shalat Nabi</h3>
					<b>Muhammad Nashiruddin Al Albani</b>
					<br />
					<br />

					<p>
						"Aku ketengahkan di dalam buku ini beberapa faidah tambahan atas kitab "Shifat Shalat", aku berikan isyarat kepadanya, dan hal ini aku anggap bagus untuk disebutkan. Selain itu, aku juga memberikan perhatian khusus untuk menjelaskan sebagian lafazh-lafazh yang diriwayatkan dalam sebagian kalimat-kalimat baru, atau pada sebagian dzikir-dzikir (yang ada)."
					</p>

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
				<a href="#" class="btn btn-orange"><span class="fa fa-download"></span> Download (3232x)</a>

			</div>

		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
