{!! Form::model($pertanyaan, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method]) !!}

<div class="form-group{{ $errors->has('daerah_asal') ? ' has-error' : '' }}">
	<label for="daerah_asal" class="control-label col-sm-3">Daerah Asal:</label>
	<div class="col-sm-9">
		{{ Form::text('daerah_asal', $pertanyaan->daerah_asal, ['class' => 'form-control', 'placeholder' => 'Daerah Asal']) }}

		@if ($errors->has('daerah_asal'))
		<span class="help-block">
			<strong>{{ $errors->first('daerah_asal') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
	<label for="group_id" class="control-label col-sm-3">Kategori Pertanyaan:</label>
	<div class="col-sm-9">
		{{ Form::select('group_id', \App\Group::active()->pertanyaan()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), $pertanyaan->group_id, ['class' => 'form-control', 'placeholder' => '-- Kategori Pertanyaan --']) }}

		@if ($errors->has('group_id'))
		<span class="help-block">
			<strong>{{ $errors->first('group_id') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
	<label for="judul_pertanyaan" class="control-label col-sm-3">Judul Pertanyaan:</label>
	<div class="col-sm-9">
		{{ Form::text('judul_pertanyaan', $pertanyaan->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

		@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
	<label for="ket_pertanyaan" class="control-label col-sm-3">Keterangan Pertanyaan:</label>
	<div class="col-sm-9">
		{{ Form::textarea('ket_pertanyaan', $pertanyaan->ket_pertanyaan, ['rows' => 7, 'class' => 'summernote', 'placeholder' => 'Tulis Pertanyaan']) }}

		@if ($errors->has('ket_pertanyaan'))
			<span class="help-block">
				<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
			</span>
		@endif
	</div>
</div>

@if (auth()->check() && auth()->user()->isAdmin())
<div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}">
	<label for="jawaban" class="control-label col-sm-3">Jawaban:</label>
	<div class="col-sm-9">
		{{ Form::textarea('jawaban', $pertanyaan->jawaban, ['rows' => 10, 'class' => 'summernote', 'placeholder' => 'Tulis Jawaban']) }}

		@if ($errors->has('jawaban'))
		<span class="help-block">
			<strong>{{ $errors->first('jawaban') }}</strong>
		</span>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('active')) has-error @endif">
	<label for="status" class="control-label col-sm-3">Status:</label>
		<div class="col-sm-9">
		{!! Form::select('status', ['s' => 'Tampilkan', 'h' => 'Sembunyikan'], $pertanyaan->status, ['class' => 'form-control']) !!}
		@if ($errors->has('status'))
			<span class="help-block">
				<strong>{{ $errors->first('status') }}</strong>
			</span>
		@endif
	</div>
</div>
@endif

<div class="form-group">
	<div class="col-sm-offset-3 col-sm-9">
		<button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
	</div>
</div>

{!! Form::close() !!}
