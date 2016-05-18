{!! Form::model($hadist, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		<div class="col-md-12">
			{{ Form::text('judul', $hadist->judul, ['class' => 'form-control input-lg', 'placeholder' => 'Judul Hadist']) }}

			@if ($errors->has('judul'))
			<span class="help-block">
				<strong>{{ $errors->first('judul') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
		<!-- <label for="group_id" class="col-md-2 control-label">Group :</label> -->
		<div class="col-md-12">
			{{ Form::select('group_id',
				\App\Group::hadist()->orderBy('group_name', 'ASC')->pluck('group_name', 'group_id'),
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
		<div class="col-md-12">
			{{ Form::textarea('hadist', $hadist->hadist, ['class' => 'summernote', 'placeholder' => 'Hadist']) }}

			@if ($errors->has('hadist'))
			<span class="help-block">
				<strong>{{ $errors->first('hadist') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group{{ $errors->has('penjelasan') ? ' has-error' : '' }}">
		<div class="col-md-12">
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
