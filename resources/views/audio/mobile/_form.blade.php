<div class="row-post">
	{!! Form::model($audio, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
			{{ Form::text('judul', $audio->judul, ['class' => 'form-control', 'placeholder' => 'Judul Audio']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->audio()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$audio->group_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Kategori Audio --'
				]
			) }}

			@if ($errors->has('group_id'))
				<span class="help-block">
					<strong>{{ $errors->first('group_id') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('file')) has-error @endif">
			<input type="file" name="file" class="form-control">
			@if ($errors->has('file'))
			<span class="help-block">
				<strong>{{ $errors->first('file') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('keterangan')) has-error @endif">
			{!! Form::textarea('keterangan', strip_tags($audio->keterangan), ['class' => 'form-control', 'placeholder' => 'Keterangan', 'rows' => 4]) !!}
			@if ($errors->has('keterangan'))
				<span class="help-block">
					<strong>{{ $errors->first('keterangan') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>

	{!! Form::close() !!}
</div>
