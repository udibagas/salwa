@extends('layouts.main')

@section('breadcrumbs')

	<div class="container">
		<br />
		<div class="btn-group btn-breadcrumb">
			<a href="#" class="btn btn-info"><i class="fa fa-home"></i></a>
			<a href="#" class="btn btn-info">FORUM</a>
			<a href="#" class="btn btn-info">Create New Thread</a>
		</div>
	</div>

@stop

@section('content')

<h1>Buat Thread Baru</h1><hr />
<div class="row">
	<div class="col-md-8">

		<form class="form-vertical" action="index.html" method="post">
			<div class="form-group">
				<select class="form-control" name="">
					<option value="">-- Pilih Forum --</option>
					<option value="Tanya Jawab">Tanya Jawab</option>
					<option value="Informasi">Informasi</option>
					<option value="Informasi">Kuliner</option>
					<option value="Informasi">Forum Bersama</option>
					<option value="Informasi">Fawaid Ilmiah</option>
					<option value="Informasi">Jual Beli</option>
					<option value="Informasi">Kesehatan</option>
				</select>
			</div>

			<div class="form-group">
				<input type="text" name="judul" value="" placeholder="Judul Forum" class="form-control">
			</div>

			<div class="form-group">
				<textarea name="isi" rows="8" class="form-control" placeholder="Isi Forum"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-orange"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>



	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
