<div class="row-post">
	{!! Form::model($produk, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $produk->judul, ['class' => 'form-control', 'placeholder' => 'Judul']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
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

		<div class="form-group{{ $errors->has('penulis') ? ' has-error' : '' }}">
			{{ Form::text('penulis', $produk->penulis, ['class' => 'form-control', 'placeholder' => 'Penulis']) }}

			@if ($errors->has('penulis'))
			<span class="help-block">
				<strong>{{ $errors->first('penulis') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
			{{ Form::text('penerbit', $produk->penerbit, ['class' => 'form-control', 'placeholder' => 'Penerbit']) }}

			@if ($errors->has('penerbit'))
			<span class="help-block">
				<strong>{{ $errors->first('penerbit') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
			{{ Form::text('harga', $produk->harga, ['class' => 'form-control', 'placeholder' => 'Harga']) }}

			@if ($errors->has('harga'))
			<span class="help-block">
				<strong>{{ $errors->first('harga') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
			<input type="file" name="img" class="form-control">

			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif

			@if ($produk->img_buku)
			<br>
			<img src="/{{ $produk->img_buku }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group{{ $errors->has('sinopsis_kecil') ? ' has-error' : '' }}">
			{{ Form::textarea('sinopsis_kecil', strip_tags($produk->sinopsis_kecil), ['class' => 'form-control', 'placeholder' => 'Sinopsis Kecil', 'rows' => 3]) }}

			@if ($errors->has('sinopsis_kecil'))
			<span class="help-block">
				<strong>{{ $errors->first('sinopsis_kecil') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('sinopsis') ? ' has-error' : '' }}">
			{{ Form::textarea('sinopsis', strip_tags($produk->sinopsis), ['class' => 'form-control', 'placeholder' => 'Sinopsis', 'rows' => 10]) }}

			@if ($errors->has('sinopsis'))
			<span class="help-block">
				<strong>{{ $errors->first('sinopsis') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>

	{!! Form::close() !!}
</div>
