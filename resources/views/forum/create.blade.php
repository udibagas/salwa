@extends('layouts.main')

@section('title') Forum : Create New Thread @stop

@section('breadcrumbs')

	@include('layouts._breadcrumbs', [
		'breadcrumbs' => [
			'/forum' => 'FORUM',
			'#' => 'New Thread',
		]
	])

@stop

@section('content')

<div class="row">
	<div class="col-md-9">
		<h4 class="title">Buat Thread Baru</h4>

		{!! Form::model($model) !!}

		<form class="form-vertical" action="index.html" method="post">
			<div class="form-group">
				{{ Form::select('group_id',
					\App\Group::forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
					$model->group_id, [
						'class' => 'form-control',
						'placeholder' => '--Pilih Kategori--'
					]
				) }}
			</div>

			<div class="form-group">
				{{ Form::text('title', $model->title, ['class' => 'form-control', 'placeholder' => 'Judul Forum']) }}
			</div>

			<div class="form-group">
				<textarea name="isi" rows="8" class="form-control" placeholder="Isi Forum"></textarea>
			</div>

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>



	</div>

	<div class="col-md-3">
		@include('home.sidebar')
	</div>
</div>



@stop
