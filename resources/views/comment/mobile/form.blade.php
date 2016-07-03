<h4 class="title">Tulis Komentar</h4>
<div class="row-post">
	{!! Form::model($comment, ['url' => $url, 'method' => $method]) !!}

		{!! Form::hidden('commentable_id', $comment->commentable_id) !!}
		{!! Form::hidden('commentable_type', $comment->commentable_type) !!}
		{!! Form::hidden('redirect', url()->current()) !!}

		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
			{!! Form::text('title', $comment->title, ['class' => 'form-control', 'placeholder' => 'Judul Komentar']) !!}

			@if ($errors->has('title'))
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
			{!! Form::textarea('content', $comment->content, ['class' => 'form-control', 'rows' => 4, 'placeholder' => 'Komentar Anda']) !!}

			@if ($errors->has('content'))
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-send"></i> Kirim Komentar</button>
		</div>

	{!! Form::close() !!}
</div>
