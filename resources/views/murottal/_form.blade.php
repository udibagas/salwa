<div class="row">
	<div class="col-md-9">
		{!! Form::model($murottal, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('nama_surat') ? ' has-error' : '' }}">
				<label for="nama_surat" class="col-md-2 control-label">Nama Surat:</label>
				<div class="col-md-10">
					{{ Form::text('nama_surat', $murottal->nama_surat, ['class' => 'form-control', 'placeholder' => 'Nama Surat']) }}

					@if ($errors->has('nama_surat'))
					<span class="help-block">
						<strong>{{ $errors->first('nama_surat') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-md-2 control-label">Group:</label>
				<div class="col-md-10">
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
			</div>

			<div class="form-group @if ($errors->has('file')) has-error @endif">
				<label for="file" class="col-md-2 control-label">File MP3:</label>
				<div class="col-md-10">
					<input type="file" name="file" class="form-control">
					@if ($errors->has('file'))
					<span class="help-block">
						<strong>{{ $errors->first('file') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('keterangan')) has-error @endif">
				<label for="keterangan" class="col-md-2 control-label">Keterangan:</label>
				<div class="col-md-10">
					{!! Form::textarea('keterangan', $murottal->keterangan, ['class' => 'form-control', 'placeholder' => 'Keterangan', 'rows' => 4]) !!}
					@if ($errors->has('keterangan'))
						<span class="help-block">
							<strong>{{ $errors->first('keterangan') }}</strong>
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
	</div>
	<div class="col-md-3">
		@if ($murottal->file_mp3)
		<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $murottal->file_mp3 }}" type="application/ogg"></source></audio>
		@endif
	</div>
</div>
