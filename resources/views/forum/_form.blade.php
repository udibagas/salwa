{!! Form::model($forum, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
		<label for="title" class="col-md-2 control-label">Judul:</label>
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
		<label for="group_id" class="col-md-2 control-label">Group:</label>
		<div class="col-md-10">
			{{ Form::select('group_id',
				\App\Group::forum()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
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
		<div class="col-md-12">
			{{ Form::textarea('description', nl2br($forum->post->description), ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('description'))
			<span class="help-block">
				<strong>{{ $errors->first('description') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-sm-12">
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

{!! Form::close() !!}