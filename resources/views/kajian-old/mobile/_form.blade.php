<div class="row-post">
	{!! Form::model($kajian, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('kajian_tema') ? ' has-error' : '' }}">
			{{ Form::text('kajian_tema', $kajian->kajian_tema, ['class' => 'form-control', 'placeholder' => 'Tema Kajian']) }}

			@if ($errors->has('kajian_tema'))
			<span class="help-block">
				<strong>{{ $errors->first('kajian_tema') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('kajian_ustadz_id') ? ' has-error' : '' }}">
			{{ Form::select('kajian_ustadz_id',
				\App\Ustadz::orderBy('ustadz_name', 'ASC')->pluck('ustadz_name', 'ustadz_id'),
				$kajian->kajian_ustadz_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Ustadz --'
				]
			) }}

			@if ($errors->has('kajian_ustadz_id'))
				<span class="help-block">
					<strong>{{ $errors->first('kajian_ustadz_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('jenis_kajian') ? ' has-error' : '' }}">
			{{ Form::select('jenis_kajian',
				\App\KajianOld::jenisKajianList(),
				$kajian->jenis_kajian, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Jenis Kajian --'
				]
			) }}

			@if ($errors->has('jenis_kajian'))
				<span class="help-block">
					<strong>{{ $errors->first('jenis_kajian') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
			{{ Form::text('tanggal', $kajian->tanggal, ['class' => 'form-control', 'placeholder' => 'Tanggal Kajian (Untuk jenis kajian sekali waktu)']) }}

			@if ($errors->has('tanggal'))
			<span class="help-block">
				<strong>{{ $errors->first('tanggal') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('setiap_hari') ? ' has-error' : '' }}">
			{{ Form::select('setiap_hari',
				\App\KajianOld::getHari(),
				$kajian->setiap_hari, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Hari (Untuk jenis kajian pekanan) --'
				]
			) }}

			@if ($errors->has('setiap_hari'))
				<span class="help-block">
					<strong>{{ $errors->first('setiap_hari') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('setiap_jam') ? ' has-error' : '' }}">
			{{ Form::text('setiap_jam', $kajian->setiap_jam, [
					'class' => 'form-control',
					'placeholder' => 'Jam (hh:mm:dd)'
				]
			) }}

			@if ($errors->has('setiap_jam'))
				<span class="help-block">
					<strong>{{ $errors->first('setiap_jam') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('id_lokasi') ? ' has-error' : '' }}">
			{{ Form::select('id_lokasi',
				\App\Lokasi::orderBy('nama_lokasi', 'ASC')->pluck('nama_lokasi', 'id_lokasi'),
				$kajian->id_lokasi, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Lokasi --'
				]
			) }}

			@if ($errors->has('id_lokasi'))
				<span class="help-block">
					<strong>{{ $errors->first('id_lokasi') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('id_area') ? ' has-error' : '' }}">
			{{ Form::select('id_area',
				\App\Area::orderBy('nama_area', 'ASC')->pluck('nama_area', 'id_area'),
				$kajian->id_area, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Area --'
				]
			) }}

			@if ($errors->has('id_area'))
				<span class="help-block">
					<strong>{{ $errors->first('id_area') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('kajian_tempat') ? ' has-error' : '' }}">
			{{ Form::textarea('kajian_tempat', $kajian->kajian_tempat, ['class' => 'form-control', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

			@if ($errors->has('kajian_tempat'))
			<span class="help-block">
				<strong>{{ $errors->first('kajian_tempat') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('pic_nama_ikhwan') ? ' has-error' : '' }}">
			{{ Form::text('pic_nama_ikhwan',
				$kajian->pic_nama_ikhwan, [
					'class' => 'form-control',
					'placeholder' => 'Name CP Ikhwan'
				]
			) }}

			@if ($errors->has('pic_nama_ikhwan'))
				<span class="help-block">
					<strong>{{ $errors->first('pic_nama_ikhwan') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('pic_phone_ikhwan') ? ' has-error' : '' }}">
			{{ Form::text('pic_phone_ikhwan',
				$kajian->pic_phone_ikhwan, [
					'class' => 'form-control',
					'placeholder' => 'CP Ikhwan'
				]
			) }}

			@if ($errors->has('pic_phone_ikhwan'))
				<span class="help-block">
					<strong>{{ $errors->first('pic_phone_ikhwan') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('pic_nama_akhwat') ? ' has-error' : '' }}">
			{{ Form::text('pic_nama_akhwat',
				$kajian->pic_nama_akhwat, [
					'class' => 'form-control',
					'placeholder' => 'Name CP Akhwat'
				]
			) }}

			@if ($errors->has('pic_nama_akhwat'))
				<span class="help-block">
					<strong>{{ $errors->first('pic_nama_akhwat') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('pic_phone_akhwat') ? ' has-error' : '' }}">
			{{ Form::text('pic_phone_akhwat',
				$kajian->pic_phone_akhwat, [
					'class' => 'form-control',
					'placeholder' => 'Phone CP Akhwat'
				]
			) }}

			@if ($errors->has('pic_phone_akhwat'))
				<span class="help-block">
					<strong>{{ $errors->first('pic_phone_akhwat') }}</strong>
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

			@if ($kajian->img_kajian_photo)
			<br>
			<img src="/{{ $kajian->img_kajian_photo }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group{{ $errors->has('kajian_status') ? ' has-error' : '' }}">
			{{ Form::select('kajian_status',
				['A' => 'Aktif', 'N' => 'Nonaktif'],
				$kajian->kajian_status, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Status Kajian --'
				]
			) }}

			@if ($errors->has('kajian_status'))
				<span class="help-block">
					<strong>{{ $errors->first('kajian_status') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
		</div>

	{!! Form::close() !!}
</div>
