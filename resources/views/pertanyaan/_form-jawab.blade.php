{!! Form::model($model, ['url' => '/pertanyaan/'.$model->pertanyaan_id.'/simpan-jawaban', 'class' => 'form-vertical', 'method' => 'PUT']) !!}

<div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">
	{{ Form::textarea('jawaban', $model->jawaban, ['rows' => 10, 'class' => 'form-control', 'placeholder' => 'Tulis Pertanyaan']) }}

	@if ($errors->has('jawaban'))
		<span class="help-block">
			<strong>{{ $errors->first('jawaban') }}</strong>
		</span>
	@endif
</div>

<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Jawaban</button>
</div>

{!! Form::close() !!}
