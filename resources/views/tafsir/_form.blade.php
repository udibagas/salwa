{!! Form::model($tafsir, ['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) !!}

	<div class="form-group{{ $errors->has('surah_id') ? ' has-error' : '' }}">
		<label for="surah_id" class="col-md-3 control-label">Surah:</label>
		<div class="col-md-9">
			{{ Form::select('surah_id',
				\App\Surah::selectRaw('CONCAT(id, ". ", nama) AS nama, id AS id')->orderBy('id', 'ASC')->pluck('nama', 'id'),
				$tafsir->surah_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Surah --'
				]
			) }}

			@if ($errors->has('surah_id'))
				<span class="help-block">
					<strong>{{ $errors->first('surah_id') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('from_ayah') ? ' has-error' : '' }}">
		<label for="from_ayah" class="col-md-3 control-label">Dari Ayat:</label>
		<div class="col-md-9">
			{{ Form::text('from_ayah', $tafsir->from_ayah, ['class' => 'form-control', 'placeholder' => 'Dari Ayat']) }}

			@if ($errors->has('from_ayah'))
			<span class="help-block">
				<strong>{{ $errors->first('from_ayah') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('to_ayah') ? ' has-error' : '' }}">
		<label for="to_ayah" class="col-md-3 control-label">Sampai Ayat:</label>
		<div class="col-md-9">
			{{ Form::text('to_ayah', $tafsir->to_ayah, ['class' => 'form-control', 'placeholder' => 'Sampai Ayat']) }}

			@if ($errors->has('to_ayah'))
			<span class="help-block">
				<strong>{{ $errors->first('to_ayah') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('tafsir') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::textarea('tafsir', $tafsir->tafsir, ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('tafsir'))
			<span class="help-block">
				<strong>{{ $errors->first('tafsir') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
		</div>
	</div>

{!! Form::close() !!}
