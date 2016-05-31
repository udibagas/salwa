<article class="row">
	<div class="col-md-2 col-sm-2 hidden-xs">
		<figure class="thumbnail">
			@if (auth()->user()->img_user)
			<img class="img-responsive" src="/{{ auth()->user()->img_user }}" />
			@else
			<img class="img-responsive" src="/images/nobody.jpg" />
			@endif
			<figcaption class="text-center">{{ auth()->user()->name }}</figcaption>
		</figure>
	</div>
	<div class="col-md-10">
		{{ Form::model($post, ['method' => $method, 'url' => $url, 'files' => true]) }}

		<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
			{{ Form::textarea('description', $post->description, ['class' => 'summernote', 'placeholder' => 'Tulis Komentar']) }}

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
				@each('forum._list-image-edit', $post->images, 'image')
			</div>
			@endif
		</div>

		<hr>

		<button type="submit" name="button" class="btn btn-primary"><span class="fa fa-send"></span> Kirim Komentar</button>

		{{ Form::close() }}
	</div>
</article>
