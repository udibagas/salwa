<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">{{ $header or 'TULIS' }} KOMENTAR</h3>
	</div>
	<div class="panel-body">
		{!! Form::model($comment, ['url' => $url, 'method' => $method, 'class' => 'comment']) !!}

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
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-send"></i> Kirim Komentar</button>
			</div>

		{!! Form::close() !!}
	</div>
</div>
