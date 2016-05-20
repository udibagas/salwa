<div class="row">
	<div class="col-md-9">
		{!! Form::model($informasi, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="judul" class="col-md-3 control-label">Judul:</label>
				<div class="col-md-9">
					{{ Form::text('judul', $informasi->judul, ['class' => 'form-control', 'placeholder' => 'Judul Informasi']) }}

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
						\App\Group::informasi()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$informasi->group_id, [
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

			<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
				<div class="col-md-12">
					{{ Form::textarea('content', $informasi->content, ['class' => 'summernote', 'placeholder' => '']) }}

					@if ($errors->has('content'))
					<span class="help-block">
						<strong>{{ $errors->first('content') }}</strong>
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

	<div class="col-md-3">
		@if ($informasi->img_gambar)
		<img src="/{{ $informasi->img_gambar }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
