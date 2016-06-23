<h4 class="title">Jawab Pertanyaan</h4>

{!! Form::model($pertanyaan, ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id.'/simpan-jawaban', 'class' => 'form-vertical', 'method' => 'PUT']) !!}

<div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">
	{{ Form::textarea('jawaban', $pertanyaan->jawaban, ['rows' => 10, 'class' => 'summernote', 'placeholder' => 'Tulis Jawaban']) }}

	@if ($errors->has('jawaban'))
	<span class="help-block">
		<strong>{{ $errors->first('jawaban') }}</strong>
	</span>
	@endif
</div>

<div class="form-group @if ($errors->has('active')) has-error @endif">
	{!! Form::select('status', ['s' => 'Tampilkan', 'h' => 'Sembunyikan'], $pertanyaan->status, ['class' => 'form-control']) !!}
	@if ($errors->has('status'))
		<span class="help-block">
			<strong>{{ $errors->first('status') }}</strong>
		</span>
	@endif
</div>

<div class="form-group">
	<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Jawaban</button>
</div>

{!! Form::close() !!}
