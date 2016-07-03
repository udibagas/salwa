<div class="row-post">
	{!! Form::model($peduli, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $peduli->judul, ['class' => 'form-control', 'placeholder' => 'Judul']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->peduli()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$peduli->group_id, [
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

			@if ($peduli->img_artikel)
			<br>
			<img src="/{{ $peduli->img_artikel }}" class="img-responsive" alt="" />
			@endif
		</div>

		<div class="form-group{{ $errors->has('isi') ? ' has-error' : '' }}">
			{{ Form::textarea('isi', $peduli->isi, ['class' => 'summernote', 'placeholder' => '']) }}

			@if ($errors->has('isi'))
			<span class="help-block">
				<strong>{{ $errors->first('isi') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>

	{!! Form::close() !!}
</div>
