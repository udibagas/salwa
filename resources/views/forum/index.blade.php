@extends('layouts.main')

@section('content')

	<h1 class="title">FORUM</h1>

	<div class="row">
		<div class="col-md-8">
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#tanyajawab" aria-controls="home" role="tab" data-toggle="tab">Tanya Jawab</a></li>
				<li role="presentation"><a href="#informasi" aria-controls="informasi" role="tab" data-toggle="tab">Informasi</a></li>
				<li role="presentation"><a href="#kuliner" aria-controls="kuliner" role="tab" data-toggle="tab">Kuliner</a></li>
				<li role="presentation"><a href="#bersama" aria-controls="bersama" role="tab" data-toggle="tab">Forum Bersama</a></li>
				<li role="presentation"><a href="#fawaid" aria-controls="fawaid" role="tab" data-toggle="tab">Fawaid Ilmiah</a></li>
				<li role="presentation"><a href="#jualbeli" aria-controls="jualbeli" role="tab" data-toggle="tab">Jual Beli</a></li>
				<li role="presentation"><a href="#kesehatan" aria-controls="kesehatan" role="tab" data-toggle="tab">Kesehatan</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="tanyajawab">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="informasi">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="kuliner">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="bersama">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="fawaid">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="jualbeli">@include('forum.list')</div>
				<div role="tabpanel" class="tab-pane" id="kesehatan">@include('forum.list')</div>
			</div>
		</div>

		<div class="col-md-4">
			@include('home.sidebar')
		</div>

	</div>

@stop
