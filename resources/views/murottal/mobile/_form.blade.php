<div class="row-post">
	{!! Form::model($murottal, ['url' => $url, 'method' => $method, 'files' => true]) !!}

		<div class="form-group{{ $errors->has('nama_surat') ? ' has-error' : '' }}">
			{{ Form::text('nama_surat', $murottal->nama_surat, ['class' => 'form-control', 'placeholder' => 'Nama Surat']) }}

			@if ($errors->has('nama_surat'))
			<span class="help-block">
				<strong>{{ $errors->first('nama_surat') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
			{{ Form::select('group_id',
				\App\Group::active()->murottal()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$murottal->group_id, [
					'class' => 'form-control',
					'placeholder' => '-- Pilih Kategori Murottal --'
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
			{!! Form::textarea('keterangan', $murottal->keterangan, ['class' => 'form-control', 'placeholder' => 'Keterangan', 'rows' => 4]) !!}
			@if ($errors->has('keterangan'))
				<span class="help-block">
					<strong>{{ $errors->first('keterangan') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
		</div>

	{!! Form::close() !!}
</div>
