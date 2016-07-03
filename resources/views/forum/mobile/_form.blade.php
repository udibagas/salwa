{!! Form::model($forum, ['url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		{{ Form::text('title', $forum->title, ['class' => 'form-control', 'placeholder' => 'Judul Forum']) }}

		@if ($errors->has('title'))
		<span class="help-block">
			<strong>{{ $errors->first('title') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		{{ Form::select('group_id',
			\App\Group::active()->forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
			$forum->group_id, [
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

	<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		{{ Form::textarea('description',  $post ? strip_tags($post->description) : '', ['class' => 'form-control', 'rows' => 10, 'placeholder' => 'Description']) }}

		@if ($errors->has('description'))
		<span class="help-block">
			<strong>{{ $errors->first('description') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('img[0]') ? ' has-error' : '' }}">
		<input type="file" name="img[]" class="note-image-input form-control" multiple="multiple">
		<span class="help-block">
			<strong>Tekan ctrl + click untuk memilih lebih dari 1 file pada dialog file. Hanya diperbolehkan upload gambar.</strong>
		</span>
		@if ($errors->has('img[0]'))
			<span class="help-block">
				<strong>{{ $errors->first('img[0]') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group">
		@if ($post && $post->images)
			@each('post._image-edit', $post->images, 'image')
			<div class="clearfix"></div>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
	</div>

{!! Form::close() !!}
