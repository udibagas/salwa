<div class="row">
	<div class="col-md-6">
		{!! Form::model($area, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('id_lokasi') ? ' has-error' : '' }}">
				<label for="id_lokasi" class="col-md-3 control-label">Lokasi:</label>
				<div class="col-md-9">
					{!! Form::select('id_lokasi', \App\Lokasi::orderBy('nama_lokasi', 'ASC')->pluck('nama_lokasi', 'id_lokasi'), $area->id_lokasi, ['class' => 'form-control', 'placeholder' => '- Pilih Lokasi -']) !!}

					@if ($errors->has('id_lokasi'))
					<span class="help-block">
						<strong>{{ $errors->first('id_lokasi') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('nama_area') ? ' has-error' : '' }}">
				<label for="nama_area" class="col-md-3 control-label">Nama Area:</label>
				<div class="col-md-9">
					{{ Form::text('nama_area', $area->nama_area, ['class' => 'form-control', 'placeholder' => 'Nama Area']) }}

					@if ($errors->has('nama_area'))
					<span class="help-block">
						<strong>{{ $errors->first('nama_area') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>
