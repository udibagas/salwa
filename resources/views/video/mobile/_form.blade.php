<div class="row-post">
	{!! Form::model($video, ['url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		{{ Form::text('title', $video->title, ['class' => 'form-control', 'placeholder' => 'Judul Video']) }}

		@if ($errors->has('title'))
		<span class="help-block">
			<strong>{{ $errors->first('title') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('url_video_youtube') ? ' has-error' : '' }}">
		{{ Form::text('url_video_youtube', $video->url_video_youtube, ['class' => 'form-control', 'placeholder' => 'Youtube ID']) }}

		@if ($errors->has('url_video_youtube'))
			<span class="help-block">
				<strong>{{ $errors->first('url_video_youtube') }}</strong>
			</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
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

	<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
		<input type="file" name="img" class="note-image-input form-control">

		@if ($errors->has('img'))
			<span class="help-block">
				<strong>{{ $errors->first('img') }}</strong>
			</span>
		@endif

		@if ($video->img_video)
		<br>
		<img src="/{{ $video->img_video }}" class="img-responsive" alt="" />
		@endif
	</div>

	<div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
		{{ Form::textarea('desc', $video->desc, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4]) }}

		@if ($errors->has('desc'))
		<span class="help-block">
			<strong>{{ $errors->first('desc') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
	</div>

	{!! Form::close() !!}
</div>
