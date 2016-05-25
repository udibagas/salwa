<div class="row">
	<div class="col-md-9">
		{!! Form::model($kajian, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('kajian_tema') ? ' has-error' : '' }}">
				<label for="kajian_tema" class="col-md-3 control-label">Tema Kajian:</label>
				<div class="col-md-9">
					{{ Form::text('kajian_tema', $kajian->kajian_tema, ['class' => 'form-control', 'placeholder' => 'Tema Kajian']) }}

					@if ($errors->has('kajian_tema'))
					<span class="help-block">
						<strong>{{ $errors->first('kajian_tema') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kajian_ustadz_id') ? ' has-error' : '' }}">
				<label for="kajian_ustadz_id" class="col-md-3 control-label">Ustadz:</label>
				<div class="col-md-9">
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
			</div>

			<div class="form-group{{ $errors->has('jenis_kajian') ? ' has-error' : '' }}">
				<label for="jenis_kajian" class="col-md-3 control-label">Jenis Kajian:</label>
				<div class="col-md-9">
					{{ Form::select('jenis_kajian',
						\App\Kajian::jenisKajianList(),
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
			</div>

			<div class="form-group{{ $errors->has('kajian_dates') ? ' has-error' : '' }}">
				<label for="kajian_dates" class="col-md-3 control-label">Tanggal:</label>
				<div class="col-md-9">
					{{ Form::text('kajian_dates', $kajian->kajian_dates, ['class' => 'form-control', 'placeholder' => 'Tanggal Kajian (Untuk jenis kajian sekali waktu)']) }}

					@if ($errors->has('kajian_dates'))
					<span class="help-block">
						<strong>{{ $errors->first('kajian_dates') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('setiap_hari') ? ' has-error' : '' }}">
				<label for="setiap_hari" class="col-md-3 control-label">Setiap Hari:</label>
				<div class="col-md-9">
					{{ Form::select('setiap_hari',
						\App\Kajian::getHari(),
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
			</div>

			<div class="form-group{{ $errors->has('id_lokasi') ? ' has-error' : '' }}">
				<label for="id_lokasi" class="col-md-3 control-label">Lokasi:</label>
				<div class="col-md-9">
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
			</div>

			<div class="form-group{{ $errors->has('id_area') ? ' has-error' : '' }}">
				<label for="id_area" class="col-md-3 control-label">Area:</label>
				<div class="col-md-9">
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
			</div>

			<div class="form-group{{ $errors->has('kajian_tempat') ? ' has-error' : '' }}">
				<label for="kajian_tempat" class="col-md-3 control-label">Tempat:</label>
				<div class="col-md-9">
					{{ Form::textarea('kajian_tempat', $kajian->kajian_tempat, ['class' => 'form-control', 'placeholder' => 'Tempat Kajian', 'rows' => 4]) }}

					@if ($errors->has('kajian_tempat'))
					<span class="help-block">
						<strong>{{ $errors->first('kajian_tempat') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kajian_pic_id') ? ' has-error' : '' }}">
				<label for="kajian_pic_id" class="col-md-3 control-label">PIC Ikhwan:</label>
				<div class="col-md-9">
					{{ Form::select('kajian_pic_id',
						\App\Pic::orderBy('pic_name', 'ASC')->pluck('pic_name', 'pic_id'),
						$kajian->kajian_pic_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih PIC Ikhwan --'
						]
					) }}

					@if ($errors->has('kajian_pic_id'))
						<span class="help-block">
							<strong>{{ $errors->first('kajian_pic_id') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kajian_pic_id2') ? ' has-error' : '' }}">
				<label for="kajian_pic_id2" class="col-md-3 control-label">PIC Akhwat:</label>
				<div class="col-md-9">
					{{ Form::select('kajian_pic_id2',
						\App\Pic::orderBy('pic_name', 'ASC')->pluck('pic_name', 'pic_id'),
						$kajian->kajian_pic_id2, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih PIC Akhwat --'
						]
					) }}

					@if ($errors->has('kajian_pic_id2'))
						<span class="help-block">
							<strong>{{ $errors->first('kajian_pic_id2') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
				<label for="img" class="col-md-3 control-label">Brosur Kajian:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="form-control">

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('kajian_status') ? ' has-error' : '' }}">
				<label for="kajian_status" class="col-md-3 control-label">Status Kajian:</label>
				<div class="col-md-9">
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
			</div>

			<hr>

			<div class="form-group">
				<div class="col-md-offset-3 col-sm-9">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>

	<div class="col-md-3">
		@if ($kajian->img_kajian_photo)
		<img src="/{{ $kajian->img_kajian_photo }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
