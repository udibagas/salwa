<div class="row-post">
	{!! Form::model($pertanyaan, ['url' => $url, 'method' => $method]) !!}

	<div class="form-group{{ $errors->has('daerah_asal') ? ' has-error' : '' }}">
		{{ Form::text('daerah_asal', $pertanyaan->daerah_asal, ['class' => 'form-control', 'placeholder' => 'Daerah Asal']) }}

		@if ($errors->has('daerah_asal'))
		<span class="help-block">
			<strong>{{ $errors->first('daerah_asal') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		{{ Form::select('group_id', \App\Group::active()->pertanyaan()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'), $pertanyaan->group_id, ['class' => 'form-control', 'placeholder' => '-- Kategori Pertanyaan --']) }}

		@if ($errors->has('group_id'))
		<span class="help-block">
			<strong>{{ $errors->first('group_id') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('judul_pertanyaan') ? ' has-error' : '' }}">
		{{ Form::text('judul_pertanyaan', $pertanyaan->judul_pertanyaan, ['class' => 'form-control', 'placeholder' => 'Judul Pertanyaan']) }}

		@if ($errors->has('judul_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('judul_pertanyaan') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('ket_pertanyaan') ? ' has-error' : '' }}">
		{{ Form::textarea('ket_pertanyaan', strip_tags($pertanyaan->ket_pertanyaan), ['rows' => 7, 'class' => 'form-control', 'placeholder' => 'Tulis Pertanyaan']) }}

		@if ($errors->has('ket_pertanyaan'))
		<span class="help-block">
			<strong>{{ $errors->first('ket_pertanyaan') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
	</div>

	{!! Form::close() !!}
</div>
