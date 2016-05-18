{!! Form::model($artikel, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::text('judul', $artikel->judul, ['class' => 'form-control input-lg', 'placeholder' => 'Judul Artikel']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::textarea('isi', $artikel->isi, ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('isi'))
			<span class="help-block">
				<strong>{{ $errors->first('isi') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		<label for="group_id" class="col-md-2 control-label">Group :</label>
		<div class="col-md-4">
			{{ Form::select('group_id',
				\App\Group::artikel()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$artikel->group_id, [
					'class' => 'form-control',
					'placeholder' => '--Pilih Kategori--'
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
		<label for="user_id" class="col-md-2 control-label">User :</label>
		<div class="col-md-4">
			{{ Form::select('user_id',
				\App\User::ustadz()->orderBy('name', 'ASC')->pluck('name', 'user_id'),
				$artikel->user_id, [
					'class' => 'form-control',
					'placeholder' => '--Pilih Ustadz--'
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
		<label for="img" class="col-md-2 control-label">Gambar :</label>
		<div class="col-md-4">
			{{ Form::file('img') }}

			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

{!! Form::close() !!}
