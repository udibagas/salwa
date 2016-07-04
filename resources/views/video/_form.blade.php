<div class="row">
	<div class="col-md-9">
		{!! Form::model($video, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			<label for="title" class="col-md-3 control-label">Title:</label>
			<div class="col-md-9">
				{{ Form::text('title', $video->title, ['class' => 'form-control', 'placeholder' => 'Judul Video']) }}

				@if ($errors->has('title'))
				<span class="help-block">
					<strong>{{ $errors->first('title') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('url_video_youtube') ? ' has-error' : '' }}">
			<label for="url_video_youtube" class="col-md-3 control-label">Youtube ID:</label>
			<div class="col-md-9">
				{{ Form::text('url_video_youtube', $video->url_video_youtube, ['class' => 'form-control', 'placeholder' => 'Youtube ID']) }}

				@if ($errors->has('url_video_youtube'))
					<span class="help-block">
						<strong>{{ $errors->first('url_video_youtube') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
			<label for="user_id" class="col-md-3 control-label">User:</label>
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

		<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
			<div class="col-md-12">
				{{ Form::textarea('desc', $video->desc, ['class' => 'summernote', 'placeholder' => '']) }}

				@if ($errors->has('desc'))
				<span class="help-block">
					<strong>{{ $errors->first('desc') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<hr>

		<div class="form-group">
			<div class="col-sm-12">
				<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
			</div>
		</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-3">
		@if ($video->img_video)
		<img src="/{{ $video->img_video }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
