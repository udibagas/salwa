<div class="panel panel-info">
	<div class="panel-heading">
		<strong>Tulis Komentar</strong>
	</div>
	<div class="panel-body">
		{{ Form::model($post, ['method' => $method, 'url' => $url, 'files' => true]) }}

			{!! Form::hidden('forum_id', $post->forum_id) !!}

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				{{ Form::textarea('description', nl2br($post->description), ['class' => 'summernote', 'rows' => 4, 'placeholder' => 'Tulis Komentar']) }}

				@if ($errors->has('description'))
					<span class="help-block">
						{{ $errors->first('description') }}
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
				@if ($post->images)
				<div class="row no-gutter">
					@each('post._image-edit', $post->images, 'image')
				</div>
				@endif
			</div>

			<div class="form-group">
				<button type="submit" name="button" class="btn btn-info"><span class="fa fa-send"></span> Kirim Komentar</button>
			</div>

		{{ Form::close() }}
	</div>
</div>
