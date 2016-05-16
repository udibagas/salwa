@extends('layouts.cms')

@section('title') CMS Dashboard @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'#' => 'CMS',
			'' => 'DASHBOARD',
		]
	])

@stop

@section('cms-content')

<div class="row panel-link">
	<div class="col-md-2">
		<a href="/user">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-users"></i> USERS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\User::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/group">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-tags"></i> GROUPS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Group::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/video/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-video-camera"></i> VIDEOS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Video::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/artikel/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-file-text"></i> ARTICLES <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Artikel::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/informasi/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-newspaper-o"></i> INFORMASI <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Informasi::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/peduli/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-heart"></i> PEDULI <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Peduli::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/image/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-image"></i> IMAGES <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\SalwaImages::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/forum/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-comments"></i> FORUMS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Forum::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/mp3/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-music"></i> AUDIOS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Mp3::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/murottal/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-microphone"></i> MUROTTALS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Murottal::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/pertanyaan/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-question-circle"></i> QUESTIONS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Pertanyaan::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/doa/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-heartbeat"></i> DOA <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Hadist::doa()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/dzikir/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-hand-stop-o"></i> DZIKIR <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Hadist::dzikir()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/hadist/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-list-alt"></i> HADIST <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Hadist::hadist()->count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/produk/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-tags"></i> PRODUCTS <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Produk::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
	<div class="col-md-2">
		<a href="/buku/admin">
			<div class="panel panel-info text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-book"></i> KITAB <br>
					</h3>
				</div>
				<div class="panel-body">
					<h1>{{ \App\Buku::count() }}</h1>
				</div>
			</div>
		</a>
	</div>
</div>

@stop
