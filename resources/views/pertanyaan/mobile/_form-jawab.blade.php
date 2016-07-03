<div class="row-post">
	{!! Form::model($pertanyaan, ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id.'/simpan-jawaban', 'class' => 'form-vertical', 'method' => 'PUT']) !!}


	<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
		{{ Form::text('judul_pertanyaan', $pertanyaan->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

		@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
		{{ Form::textarea('ket_pertanyaan', $pertanyaan->ket_pertanyaan, ['rows' => 10, 'class' => 'form-control', 'placeholder' => 'Keterangan Pertanyaan']) }}

		@if ($errors->has('ket_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
		</span>
		@endif
	</div>

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
		<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-send"></i> Kirim Jawaban</button>
	</div>

	{!! Form::close() !!}
</div>
