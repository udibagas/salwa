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
	<div class="col-md-3">
		@include('forum.list-category', [
			'groups' => \App\Group::forum()->orderBy('group_name', 'ASC')->get(),
			'group' => null
		])
	</div>

	<div class="col-md-9">
		<h4 class="title">Buat Thread Baru</h4>

		{!! Form::model($model, ['class' => 'form-vertical', 'url' => '/forum', 'method' => 'post']) !!}

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				{{ Form::select('group_id',
					\App\Group::forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
					$model->group_id, [
						'class' => 'form-control',
						'placeholder' => '--Pilih Kategori--'
					]
				) }}

				@if ($errors->has('group_id'))
					<span class="help-block">
						<strong>{{ $errors->first('group_id') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
				{{ Form::text('title', $model->title, ['class' => 'form-control', 'placeholder' => 'Judul Forum']) }}

				@if ($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				{{ Form::textarea('description', $model->description, ['rows' => 7, 'class' => 'form-control', 'placeholder' => 'Tulis Komentar']) }}

				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>

		{!! Form::close() !!}


	</div>

	<!-- <div class="col-md-3">
		include('home.sidebar')
	</div> -->
</div>



@stop
