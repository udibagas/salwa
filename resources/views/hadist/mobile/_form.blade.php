<div class="row-post">
	{!! Form::model($hadist, ['url' => $url, 'method' => $method]) !!}

	<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
		{{ Form::text('judul', $hadist->judul, ['class' => 'form-control', 'placeholder' => 'Judul Hadist']) }}

		@if ($errors->has('judul'))
		<span class="help-block">
			<strong>{{ $errors->first('judul') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
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

	<div class="form-group{{ $errors->has('hadist') ? ' has-error' : '' }}">
		{{ Form::textarea('hadist', $hadist->hadist, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Hadist/Doa/Dzikir']) }}

		@if ($errors->has('hadist'))
		<span class="help-block">
			<strong>{{ $errors->first('hadist') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group{{ $errors->has('penjelasan') ? ' has-error' : '' }}">
		{{ Form::textarea('penjelasan', $hadist->penjelasan, ['class' => 'form-control', 'placeholder' => 'Penjelasan', 'rows' => 5]) }}

		@if ($errors->has('penjelasan'))
		<span class="help-block">
			<strong>{{ $errors->first('penjelasan') }}</strong>
		</span>
		@endif
	</div>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
	</div>

	{!! Form::close() !!}
</div>
