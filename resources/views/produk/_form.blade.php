<div class="row">
	<div class="col-md-9">
		{!! Form::model($produk, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-3 col-md-3 control-label">Judul:</label>
				<div class="col-md-9">
					{{ Form::text('judul', $produk->judul, ['class' => 'form-control', 'placeholder' => 'Judul']) }}

					@if ($errors->has('judul'))
					<span class="help-block">
						<strong>{{ $errors->first('judul') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-3 col-md-3 control-label">Kategori:</label>
				<div class="col-md-9">
					{{ Form::select('group_id',
						\App\Group::active()->produk()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$produk->group_id, [
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

			<div class="form-group{{ $errors->has('penulis') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-3 col-md-3 control-label">Penulis:</label>
				<div class="col-md-9">
					{{ Form::text('penulis', $produk->penulis, ['class' => 'form-control', 'placeholder' => 'Penulis']) }}

					@if ($errors->has('penulis'))
					<span class="help-block">
						<strong>{{ $errors->first('penulis') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-3 col-md-3 control-label">Penerbit:</label>
				<div class="col-md-9">
					{{ Form::text('penerbit', $produk->penerbit, ['class' => 'form-control', 'placeholder' => 'Penerbit']) }}

					@if ($errors->has('penerbit'))
					<span class="help-block">
						<strong>{{ $errors->first('penerbit') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-3 col-md-3 control-label">Harga:</label>
				<div class="col-md-9">
					{{ Form::text('harga', $produk->harga, ['class' => 'form-control', 'placeholder' => 'Harga']) }}

					@if ($errors->has('harga'))
					<span class="help-block">
						<strong>{{ $errors->first('harga') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
				<label for="img" class="col-sm-3 col-md-3 control-label">Gambar:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="form-control">

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('sinopsis_kecil') ? ' has-error' : '' }}">
				<label for="sinopsis_kecil" class="col-sm-3 col-md-3 control-label">Sinopsis Kecil:</label>
				<div class="col-md-9">
					{{ Form::textarea('sinopsis_kecil', $produk->sinopsis_kecil, ['class' => 'form-control', 'placeholder' => 'Sinopsis Kecil', 'rows' => 3]) }}

					@if ($errors->has('sinopsis_kecil'))
					<span class="help-block">
						<strong>{{ $errors->first('sinopsis_kecil') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('sinopsis') ? ' has-error' : '' }}">
				<label for="sinopsis" class="col-sm-3 col-md-3 control-label">Sinopsis:</label>
				<div class="col-md-9">
					{{ Form::textarea('sinopsis', $produk->sinopsis, ['class' => 'summernote', 'placeholder' => '']) }}

					@if ($errors->has('sinopsis'))
					<span class="help-block">
						<strong>{{ $errors->first('sinopsis') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
	<div class="col-sm-3 col-md-3">
		@if ($produk->img_buku)
		<img src="/{{ $produk->img_buku }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
