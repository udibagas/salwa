{!! Form::model($peduli, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::text('judul', $peduli->judul, ['class' => 'form-control input-lg', 'placeholder' => 'Judul']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::textarea('isi', $peduli->isi, ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('isi'))
			<span class="help-block">
				<strong>{{ $errors->first('isi') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-md-3 control-label">Group :</label>
				<div class="col-md-9">
					{{ Form::select('group_id',
						\App\Group::peduli()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$peduli->group_id, [
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
				<label for="img" class="col-md-3 control-label">Gambar :</label>
				<div class="col-md-9">
					{{ Form::file('img') }}

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
						</span>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-6">
			@if ($peduli->img_peduli)
			<img src="/{{ $peduli->img_peduli }}" class="img-responsive" alt="" />
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
