<div class="row">
	<div class="col-md-9">
		{!! Form::model($artikel, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="judul" class="col-md-3 control-label">Judul:</label>
				<div class="col-md-9">
					{{ Form::text('judul', $artikel->judul, ['class' => 'form-control', 'placeholder' => 'Judul Artikel']) }}

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
						\App\Group::artikel()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$artikel->group_id, [
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
				<label for="user_id" class="col-md-3 control-label">User:</label>
				<div class="col-md-9">
					{{ Form::select('user_id',
						\App\User::ustadz()->orderBy('name', 'ASC')->pluck('name', 'user_id'),
						$artikel->user_id, [
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
				<label for="img" class="col-md-3 control-label">Gambar:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="note-image-input form-control">

					@if ($errors->has('img'))
						<span class="help-block">
							<strong>{{ $errors->first('img') }}</strong>
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

			<hr>

			<div class="form-group">
				<div class="col-sm-12">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>

	<div class="col-md-3">
		@if ($artikel->img_artikel)
		<img src="/{{ $artikel->img_artikel }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
