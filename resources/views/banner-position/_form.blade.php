<div class="row">
	<div class="col-sm-6">
		{!! Form::model($lokasi, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('nama_lokasi') ? ' has-error' : '' }}">
				<label for="nama_lokasi" class="col-sm-2 control-label">Name:</label>
				<div class="col-sm-10">
					{{ Form::text('nama_lokasi', $lokasi->nama_lokasi, ['class' => 'form-control', 'placeholder' => 'Name']) }}

					@if ($errors->has('nama_lokasi'))
					<span class="help-block">
						<strong>{{ $errors->first('nama_lokasi') }}</strong>
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
	</div>
</div>
