{!! Form::model($forum, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		<label for="title" class="col-sm-2 control-label">Judul:</label>
		<div class="col-md-10">
			{{ Form::text('title', $forum->title, ['class' => 'form-control', 'placeholder' => 'Judul Forum']) }}

			@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		<label for="group_id" class="col-sm-2 control-label">Kategori:</label>
		<div class="col-md-10">
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
	</div>

	<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
		<label for="description" class="col-sm-2 control-label">Decription:</label>
		<div class="col-md-10">
			{{ Form::textarea('description',  $post ? $post->description : '', ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('description'))
			<span class="help-block">
				<strong>{{ $errors->first('description') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('img[0]') ? ' has-error' : '' }}">
		<label for="img" class="col-sm-2 control-label">Gambar:</label>
		<div class="col-md-10">
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
	</div>

	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			@if ($post && $post->images)
			<div class="row no-gutter">
				@each('post._image-edit', $post->images, 'image')
			</div>
			@endif
		</div>
	</div>

	<div class="form-group">
		<div class=" col-md-offset-2 col-md-10">
			<button type="submit" name="submit" class="btn btn-primary">
				<i class="fa fa-save"></i> SIMPAN
			</button>
		</div>
	</div>

{!! Form::close() !!}
