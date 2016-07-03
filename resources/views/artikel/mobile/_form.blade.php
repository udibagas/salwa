{!! Form::model($artikel, ['url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		{{ Form::text('judul', $artikel->judul, ['class' => 'form-control', 'placeholder' => 'Judul Artikel']) }}

		@if ($errors->has('judul'))
		<span class="help-block">
			<strong>{{ $errors->first('judul') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		{{ Form::select('group_id',
			\App\Group::active()->artikel()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
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

	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
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

	<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
		<input type="file" name="img" class="note-image-input form-control">

		@if ($errors->has('img'))
			<span class="help-block">
				<strong>{{ $errors->first('img') }}</strong>
			</span>
		@endif

		@if ($artikel->img_artikel)
		<br>
		<img src="/{{ $artikel->img_artikel }}" class="img-responsive" alt="" />
		@endif
	</div>

	<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
		{{ Form::textarea('isi', $artikel->isi, ['class' => 'summernote', 'placeholder' => '']) }}

		@if ($errors->has('isi'))
		<span class="help-block">
			<strong>{{ $errors->first('isi') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
	</div>

{!! Form::close() !!}
