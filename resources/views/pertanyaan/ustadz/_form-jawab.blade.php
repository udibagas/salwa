<!-- <p>
	<strong>Penanya :
		{{ $pertanyaan->user ? $pertanyaan->user->name : '' }}
		@if ($pertanyaan->daerah_asal) ({{ $pertanyaan->daerah_asal }}) @endif
	</strong>
</p> -->

{!! Form::model($pertanyaan, ['url' => '/pertanyaan/'.$pertanyaan->pertanyaan_id.'/simpan-jawaban', 'class' => 'form-horizontal', 'method' => 'PUT']) !!}


<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
	<label for="judul_pertanyaan" class="control-label col-md-2">Judul Pertanyaan</label>
	<div class="col-md-10">
		{{ Form::text('judul_pertanyaan', $pertanyaan->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

		@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
	<label for="ket_pertanyaan" class="control-label col-md-2">Keterangan Pertanyaan</label>
	<div class="col-md-10">
		{{ Form::textarea('ket_pertanyaan', strip_tags($pertanyaan->ket_pertanyaan), ['rows' => 10, 'class' => 'form-control', 'placeholder' => 'Keterangan Pertanyaan']) }}

		@if ($errors->has('ket_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">
	<label for="jawaban" class="control-label col-md-2">Jawaban</label>
	<div class="col-md-10">
		{{ Form::textarea('jawaban', $pertanyaan->jawaban, ['rows' => 10, 'class' => 'summernote', 'placeholder' => 'Tulis Jawaban']) }}

		@if ($errors->has('jawaban'))
		<span class="help-block">
			<strong>{{ $errors->first('jawaban') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('active')) has-error @endif">
	<label for="status" class="control-label col-md-2">Tampilkan</label>
	<div class="col-md-10">
		{!! Form::select('status', ['s' => 'Ya', 'h' => 'Tidak'], $pertanyaan->status, ['class' => 'form-control']) !!}
		@if ($errors->has('status'))
		<span class="help-block">
			<strong>{{ $errors->first('status') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group">
	<div class="col-md-10 col-md-offset-2">
		<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> KIRIM JAWABAN</button>
	</div>
</div>

{!! Form::close() !!}
