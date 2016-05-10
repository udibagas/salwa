{!! Form::model($model, ['class' => 'form-vertical', 'url' => $url, 'method' => $method]) !!}

<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
	{{ Form::text('judul_pertanyaan', $model->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

	@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
	@endif
</div>

<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
	{{ Form::textarea('ket_pertanyaan', $model->ket_pertanyaan, ['rows' => 7, 'class' => 'form-control', 'placeholder' => 'Tulis Pertanyaan']) }}

	@if ($errors->has('ket_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
		</span>
	@endif
</div>

<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Pertanyaan</button>
</div>

{!! Form::close() !!}
