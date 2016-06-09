<div class="row">
	<div class="col-md-9">
		{!! Form::model($kitab, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="judul" class="col-md-3 control-label">Judul:</label>
				<div class="col-md-9">
					{{ Form::text('judul', $kitab->judul, ['class' => 'form-control', 'placeholder' => 'Judul Kitab']) }}

					@if ($errors->has('judul'))
					<span class="help-block">
						<strong>{{ $errors->first('judul') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('penulis') ? ' has-error' : '' }}">
				<label for="penulis" class="col-md-3 control-label">Penulis:</label>
				<div class="col-md-9">
					{{ Form::text('penulis', $kitab->penulis, ['class' => 'form-control', 'placeholder' => 'Penulis']) }}

					@if ($errors->has('penulis'))
					<span class="help-block">
						<strong>{{ $errors->first('penulis') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-md-3 control-label">Kategori:</label>
				<div class="col-md-9">
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
			</div>

			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
				<label for="img" class="col-md-3 control-label">Gambar:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="form-control">

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
				<label for="file" class="col-md-3 control-label">File PDF:</label>
				<div class="col-md-9">
					<input type="file" name="file" class="form-control">

					@if ($errors->has('file'))
						<span class="help-block">
							<strong>{{ $errors->first('file') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('materi') ? ' has-error' : '' }}">
				<label for="materi" class="col-md-3 control-label">Keterangan:</label>
				<div class="col-md-9">
					{{ Form::textarea('materi', $kitab->materi, ['class' => 'summernote', 'placeholder' => '']) }}

					@if ($errors->has('materi'))
					<span class="help-block">
						<strong>{{ $errors->first('materi') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class=" col-md-offset-3 col-md-9">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>

	<div class="col-md-3">
		@if ($kitab->img_buku)
		<img src="/{{ $kitab->img_buku }}" class="img-responsive" alt="" />
		@endif

		@if ($kitab->file_pdf)
		<br>
		<a href="/kitab/{{ $kitab->buku_id }}/download" target="_blank" class="btn btn-info form-control"><i class="fa fa-download"></i> Download File PDF</a>
		@endif
	</div>
</div>
