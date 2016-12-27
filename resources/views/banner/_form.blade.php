<div class="row">
	<div class="col-md-9">
		{!! Form::model($banner, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				<label for="name" class="col-sm-2 control-label">Name :</label>
				<div class="col-md-10">
					{{ Form::text('name', $banner->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
				<label for="url" class="col-sm-2 control-label">URL :</label>
				<div class="col-md-10">
					{{ Form::text('url', $banner->url, ['class' => 'form-control', 'placeholder' => 'URL']) }}

					@if ($errors->has('url'))
					<span class="help-block">
						<strong>{{ $errors->first('url') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('img')) has-error @endif">
				<label for="img" class="col-sm-2 control-label">Gambar :</label>
				<div class="col-md-10">
					<input type="file" name="img" class="form-control">
					@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
					@endif

					@if ($banner->img_banner)
					<br>
					<img src="/{{ $banner->img_banner }}" alt="" />
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
				<label for="active" class="col-sm-2 control-label">Active :</label>
				<div class="col-md-10">
					{{ Form::select('active',
						['0' => 'No', '1' => 'Yes'],
						$banner->active, [
							'class' => 'form-control',
						]
					) }}

					@if ($errors->has('active'))
						<span class="help-block">
							<strong>{{ $errors->first('active') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class=" col-md-offset-2 col-md-10">
					<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>
