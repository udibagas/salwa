<div class="row">
	<div class="col-md-9">
		{!! Form::model($popup, ['url' => $url, 'method' => $method, 'class' => 'form-horizontal', 'files' => true]) !!}

			<div class="form-group @if ($errors->has('title')) has-error @endif">
				<label for="title" class="col-md-3 control-label">Title:</label>
				<div class="col-md-9">
					{!! Form::text('title', $popup->title, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
					@if ($errors->has('title'))
					<span class="help-block">
						<strong>{{ $errors->first('title') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('url')) has-error @endif">
				<label for="url" class="col-md-3 control-label">Title:</label>
				<div class="col-md-9">
					{!! Form::text('url', $popup->url, ['class' => 'form-control', 'placeholder' => 'URL']) !!}
					@if ($errors->has('url'))
					<span class="help-block">
						<strong>{{ $errors->first('url') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('start')) has-error @endif">
				<label for="start" class="col-md-3 control-label">Mulai:</label>
				<div class="col-md-9">
					{!! Form::text('start', $popup->start, ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd hh:mm:ss']) !!}
					@if ($errors->has('start'))
					<span class="help-block">
						<strong>{{ $errors->first('start') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('end')) has-error @endif">
				<label for="end" class="col-md-3 control-label">Sampai:</label>
				<div class="col-md-9">
					{!! Form::text('end', $popup->end, ['class' => 'form-control', 'placeholder' => 'yyyy-mm-dd hh:mm:ss']) !!}
					@if ($errors->has('end'))
					<span class="help-block">
						<strong>{{ $errors->first('end') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('active')) has-error @endif">
				<label for="active" class="col-md-3 control-label">Aktif:</label>
				<div class="col-md-9">
					{!! Form::checkbox('active', 1, ['checked' => $popup->active]) !!}
				</div>
			</div>

			<div class="form-group @if ($errors->has('img')) has-error @endif">
				<label for="img" class="col-md-3 control-label">Gambar:</label>
				<div class="col-md-9">
					<input type="file" name="img" class="form-control">
					@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-3">
		@if ($popup->img)
		<img src="/{{ $popup->img }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
