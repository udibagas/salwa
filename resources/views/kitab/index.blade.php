@extends('layouts.main')

@section('content')

	<h1 class="title">KITAB & TERJEMAHAN</h1>

	<div class="row">
		<div class="col-md-8">
			@for ($i=0;$i<=10;$i++)
				<div class="media alert alert-warning">
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

						<a href="#" class="btn btn-orange"><span class="fa fa-download"></span> Download</a>
					</div>
				</div>
			@endfor
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
