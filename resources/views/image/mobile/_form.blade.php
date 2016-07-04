<div class="row-post">
	{!! Form::model($image, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $image->judul, ['class' => 'form-control', 'placeholder' => 'Judul Image']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->image()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$image->group_id, [
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

		<div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
			<input type="file" name="img" class="form-control">

			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif

			@if ($image->img_images)
			<br>
			<img src="/{{ $image->img_images }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
		</div>

	{!! Form::close() !!}
</div>
