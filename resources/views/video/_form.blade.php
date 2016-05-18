{!! Form::model($video, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::text('judul', $video->judul, ['class' => 'form-control input-lg', 'placeholder' => 'Judul Artikel']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::textarea('isi', $video->isi, ['class' => 'summernote', 'placeholder' => '']) }}

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
						\App\Group::video()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$video->group_id, [
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

			<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
				<label for="user_id" class="col-md-3 control-label">User :</label>
				<div class="col-md-9">
					{{ Form::select('user_id',
						\App\User::ustadz()->orderBy('name', 'ASC')->pluck('name', 'user_id'),
						$video->user_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih User --'
						]
					) }}

					@if ($errors->has('user_id'))
						<span class="help-block">
							<strong>{{ $errors->first('user_id') }}</strong>
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
			@if ($video->img_video)
			<img src="/{{ $video->img_video }}" class="img-responsive" alt="" />
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
