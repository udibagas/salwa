<div class="row">
	<div class="col-md-9">
		{!! Form::model($audio, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				<label for="judul" class="col-sm-2 control-label">Judul:</label>
				<div class="col-md-10">
					{{ Form::text('judul', $audio->judul, ['class' => 'form-control', 'placeholder' => 'Judul Audio']) }}

					@if ($errors->has('judul'))
					<span class="help-block">
						<strong>{{ $errors->first('judul') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
				<label for="group_id" class="col-sm-2 control-label">Group:</label>
				<div class="col-md-10">
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
			</div>

			<div class="form-group @if ($errors->has('file')) has-error @endif">
				<label for="file" class="col-sm-2 control-label">File MP3:</label>
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
				<label for="keterangan" class="col-sm-2 control-label">Keterangan:</label>
				<div class="col-md-10">
					{!! Form::textarea('keterangan', $audio->keterangan, ['class' => 'summernote', 'placeholder' => 'Keterangan', 'rows' => 4]) !!}
					@if ($errors->has('keterangan'))
						<span class="help-block">
							<strong>{{ $errors->first('keterangan') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<hr>

			<div class="form-group">
				<div class="col-md-12">
					<button type="submit" name="submit" class="btn btn-info">SIMPAN</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
	<div class="col-sm-3 col-md-3">
		@if ($audio->file_mp3)
		<audio controls="controls" preload="none" style="width:100%"><source src="/{{ $audio->file_mp3 }}" type="application/ogg"></source></audio>
		@endif
	</div>
</div>
