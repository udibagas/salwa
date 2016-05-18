<section class="comment-list">
	<article class="row">
		<div class="col-md-2 col-sm-2 hidden-xs">
			<figure class="thumbnail">
				@if (auth()->user()->img_user)
				<img class="img-responsive" src="/{{ auth()->user()->img_user }}" />
				@else
				<img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
				@endif
				<figcaption class="text-center">{{ auth()->user()->name }}</figcaption>
			</figure>
		</div>
		<div class="col-md-10 col-sm-10">
			{{ Form::model($model, [
				'enctype' => 'multipart/form-data',
				'method' => 'post',
				'url' => 'forum/comment'
			]) }}

			{{ Form::hidden('forum_id', $forum->forum_id) }}

			<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
				{{ Form::textarea('description', $model->description, ['class' => 'summernote', 'placeholder' => 'Tulis Komentar']) }}

				@if ($errors->has('description'))
					<span class="help-block">
						{{ $errors->first('description') }}
					</span>
				@endif
			</div>
			<button type="submit" name="button" class="btn btn-primary"><span class="fa fa-send"></span> Kirim Komentar</button>

			{{ Form::close() }}
		</div>
	</article>
</section>
