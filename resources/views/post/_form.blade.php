{!! Form::model($model, ['url' => $url, 'method' => $method, 'enctype' => 'multipart/form-data']) !!}
	<div class="form-group @if ($errors->has('judul')) has-error @endif">
		{!! Form::text('judul', $model->judul, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
		@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group @if ($errors->has('isi')) has-error @endif">
		{!! Form::textarea('isi', $model->isi, ['class' => 'form-control', 'placeholder' => 'Isi']) !!}
		@if ($errors->has('isi'))
			<span class="help-block">
				<strong>{{ $errors->first('isi') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group">
		<label for="gambar">Gambar:</label>
		{!! Form::file('gambar') !!}
	</div>

	<hr>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</div>
{!! Form::close() !!}
