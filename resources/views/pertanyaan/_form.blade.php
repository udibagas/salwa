{!! Form::model($model, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method]) !!}

<div class="form-group{{ $errors->has('daerah_asal') ? ' has-error' : '' }}">
	<label for="daerah_asal" class="control-label col-md-2">Daerah Asal:</label>
	<div class="col-md-10">
		{{ Form::text('daerah_asal', $model->daerah_asal, ['class' => 'form-control', 'placeholder' => 'Daerah Asal']) }}

		@if ($errors->has('daerah_asal'))
		<span class="help-block">
			<strong>{{ $errors->first('daerah_asal') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
	<label for="judul_pertanyaan" class="control-label col-md-2">Judul Pertanyaan:</label>
	<div class="col-md-10">
		{{ Form::text('judul_pertanyaan', $model->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

		@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
	<label for="ket_pertanyaan" class="control-label col-md-2">Keterangan Pertanyaan:</label>
	<div class="col-md-10">
		{{ Form::textarea('ket_pertanyaan', $model->ket_pertanyaan, ['rows' => 7, 'class' => 'summernote', 'placeholder' => 'Tulis Pertanyaan']) }}

		@if ($errors->has('ket_pertanyaan'))
			<span class="help-block">
				<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
			</span>
		@endif
	</div>
</div>
<hr>
<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Pertanyaan</button>
</div>

{!! Form::close() !!}
