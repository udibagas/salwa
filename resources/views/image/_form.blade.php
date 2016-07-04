<div class="row">
	<div class="col-md-8">
		{!! Form::model($image, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="judul" class="col-md-3 control-label">Judul:</label>
				<div class="col-md-9">
					{{ Form::text('judul', $image->judul, ['class' => 'form-control', 'placeholder' => 'Judul Image']) }}

					@if ($errors->has('judul'))
					<span class="help-block">
						<strong>{{ $errors->first('judul') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-md-3 control-label">Group:</label>
				<div class="col-md-9">
					{{ Form::select('group_id',
						\App\Group::active()->image()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$image->group_id, [
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

			<hr>

			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>

	<div class="col-md-4">
		@if ($image->img_images)
		<img src="/{{ $image->img_images }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
