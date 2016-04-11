@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">KITAB & TERJEMAHAN</a>
		</div>
	</div>

@stop

@section('content')

	<h1 class="title">KITAB & TERJEMAHAN</h1>

	<div class="row">
		<div class="col-md-8">
			@for ($i=0;$i<=10;$i++)
				<div class="media alert alert-warning">
					<div class="media-left">
						<a href="/kitab/show">
							<img class="media-object" src="/images/bukushalat.jpg" alt="...">
						</a>
					</div>
					<div class="media-body">
						<a href="/kitab/show"><h3 class="media-heading">Sifat Shalat Nabi</h3></a>
						<b>Muhammad Nashiruddin Al Albani</b>
						<br />
						<br />

						<p>
							"Aku ketengahkan di dalam buku ini beberapa faidah tambahan atas kitab "Shifat Shalat", aku berikan isyarat kepadanya, dan hal ini aku anggap bagus untuk disebutkan. Selain itu, aku juga memberikan perhatian khusus untuk menjelaskan sebagian lafazh-lafazh yang diriwayatkan dalam sebagian kalimat-kalimat baru, atau pada sebagian dzikir-dzikir (yang ada)."
						</p>

						<a href="#" class="btn btn-orange"><span class="fa fa-download"></span> Download (4355x)</a>
					</div>
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
