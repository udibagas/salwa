<div class="row-post">
	{!! Form::model($kitab, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $kitab->judul, ['class' => 'form-control', 'placeholder' => 'Judul Kitab']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('penulis') ? ' has-error' : '' }}">
			{{ Form::text('penulis', $kitab->penulis, ['class' => 'form-control', 'placeholder' => 'Penulis']) }}

			@if ($errors->has('penulis'))
			<span class="help-block">
				<strong>{{ $errors->first('penulis') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->kitab()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$kitab->group_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Kategori --'
				]
			) }}

			@if ($errors->has('group_id'))
				<span class="help-block">
					<strong>{{ $errors->first('group_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
			<label for="img" class="control-label">Gambar:</label>
			<input type="file" name="img" class="form-control">

			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif

			@if ($kitab->img_buku)
			<br>
			<img src="/{{ $kitab->img_buku }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
			<label for="file" class="control-label">File PDF:</label>
			<input type="file" name="file" class="form-control">

			@if ($errors->has('file'))
				<span class="help-block">
					<strong>{{ $errors->first('file') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('materi') ? ' has-error' : '' }}">
			{{ Form::textarea('materi', strip_tags($kitab->materi), ['class' => 'form-control', 'placeholder' => 'Materi', 'rows' => 4]) }}

			@if ($errors->has('materi'))
			<span class="help-block">
				<strong>{{ $errors->first('materi') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>

	{!! Form::close() !!}
</div>
