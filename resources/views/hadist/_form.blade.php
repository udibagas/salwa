{!! Form::model($hadist, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		<label for="judul" class="col-md-2 control-label">Judul:</label>
		<div class="col-md-10">
			{{ Form::text('judul', $hadist->judul, ['class' => 'form-control', 'placeholder' => 'Judul Hadist']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		<label for="group_id" class="col-md-2 control-label">Group:</label>
		<div class="col-md-10">
			{{ Form::select('group_id',
				\App\Group::active()->hadist()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
				$hadist->group_id, [
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

	<div class="form-group{{ $errors->has('hadist') ? ' has-error' : '' }}">
		<label for="hadist" class="col-md-2 control-label">Hadist/Doa/Dzikir:</label>
		<div class="col-md-10">
			{{ Form::textarea('hadist', $hadist->hadist, ['class' => 'form-control', 'rows' => '4', 'placeholder' => 'Hadist']) }}

			@if ($errors->has('hadist'))
			<span class="help-block">
				<strong>{{ $errors->first('hadist') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('penjelasan') ? ' has-error' : '' }}">
		<label for="penjelasan" class="col-md-2 control-label">Penjelasan:</label>
		<div class="col-md-10">
			{{ Form::textarea('penjelasan', $hadist->penjelasan, ['class' => 'summernote', 'placeholder' => 'Penjelasan']) }}

			@if ($errors->has('penjelasan'))
			<span class="help-block">
				<strong>{{ $errors->first('penjelasan') }}</strong>
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
