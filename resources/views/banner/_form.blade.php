<div class="row">
	<div class="col-md-9">
		{!! Form::model($banner, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-md-2 control-label">Group:</label>
				<div class="col-md-10">
					{{ Form::select('group_id',
						\App\Group::banner()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
						$banner->group_id, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Kategori Promo --'
						]
					) }}

					@if ($errors->has('group_id'))
						<span class="help-block">
							<strong>{{ $errors->first('group_id') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
				<label for="url" class="col-md-2 control-label">URL:</label>
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
				<label for="img" class="col-md-2 control-label">Banner:</label>
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

			<hr>

			<div class="form-group">
				<div class=" col-md-offset-2 col-md-10">
					<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
</div>
