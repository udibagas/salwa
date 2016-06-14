<div class="row">
	<div class="col-md-1 col-sm-2 hidden-xs">
		<div class="thumbnail">
			<img class="img-responsive user-photo" @if (auth()->user()->img_user) src="/{{auth()->user()->img_user}}" @else src="/images/nobody.png" @endif">
		</div>
	</div>

	<div class="col-md-11 col-sm-10">
		<div class="panel panel-info panel-comment">
			<div class="panel-heading">
				<strong>{{ $header or 'Tulis' }} Komentar</strong>
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
						<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-send"></i> Kirim Komentar</button>
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<br>
