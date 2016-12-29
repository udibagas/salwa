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

<div class="row">
	<div class="col-sm-2">
		<a href="/user">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-users"></i> USERS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\User::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/group">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-tags"></i> GROUPS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Group::active()->count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/video/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-video-camera"></i> VIDEOS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Video::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/artikel/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-file-text"></i> ARTICLES <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Artikel::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/informasi/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-newspaper-o"></i> INFORMASI <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Informasi::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/peduli/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-heart"></i> PEDULI <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Peduli::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/image/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-image"></i> IMAGES <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\SalwaImages::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/forum/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-comments"></i> FORUMS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Forum::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/mp3/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-music"></i> AUDIOS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Mp3::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/murottal/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-microphone"></i> MUROTTALS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Murottal::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/pertanyaan/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-question-circle"></i> TANYA USTADZ <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Pertanyaan::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/doa/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-heartbeat"></i> DOA <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Hadist::doa()->count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/dzikir/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-hand-stop-o"></i> DZIKIR <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Hadist::dzikir()->count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/hadist/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-list-alt"></i> HADIST <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Hadist::hadist()->count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/produk/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-tags"></i> PRODUCTS <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Produk::count() }}</div>
				</div>
			</div>
		</a>
	</div>
	<div class="col-sm-2">
		<a href="/buku/admin">
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-book"></i> KITAB <br>
					</h3>
				</div>
				<div class="panel-body">
					<div style="font-size:24px;">{{ \App\Buku::count() }}</div>
				</div>
			</div>
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">ARTIKEL SERING DIBACA</h3>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">VIDEO SERING DILIHAT</h3>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">KITAB SERING DIDOWNLOAD</h3>
			</div>
			<div class="panel-body">

			</div>
		</div>
	</div>
</div>



@stop
