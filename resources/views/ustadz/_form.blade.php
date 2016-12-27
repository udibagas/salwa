<div class="row">
	<div class="col-md-9">
		{!! Form::model($ustadz, ['class' => 'form-horizontal', 'url' => $url, 'method' => $method, 'files' => true]) !!}

			<div class="form-group{{ $errors->has('ustadz_name') ? ' has-error' : '' }}">
				<label for="ustadz_name" class="col-sm-2 control-label">Name:</label>
				<div class="col-md-10">
					{{ Form::text('ustadz_name', $ustadz->ustadz_name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

					@if ($errors->has('ustadz_name'))
					<span class="help-block">
						<strong>{{ $errors->first('ustadz_name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('ustadz_address')) has-error @endif">
				<label for="ustadz_address" class="col-sm-2 control-label">Address:</label>
				<div class="col-md-10">
					{!! Form::textarea('ustadz_address', $ustadz->ustadz_address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows' => 4]) !!}
					@if ($errors->has('ustadz_address'))
						<span class="help-block">
							<strong>{{ $errors->first('ustadz_address') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('ustadz_phone') ? ' has-error' : '' }}">
				<label for="ustadz_phone" class="col-sm-2 control-label">Phone:</label>
				<div class="col-md-10">
					{{ Form::text('ustadz_phone', $ustadz->ustadz_phone, ['class' => 'form-control', 'placeholder' => 'Phone']) }}

					@if ($errors->has('ustadz_phone'))
					<span class="help-block">
						<strong>{{ $errors->first('ustadz_phone') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('ustadz_gender') ? ' has-error' : '' }}">
				<label for="ustadz_gender" class="col-sm-2 control-label">Gender:</label>
				<div class="col-md-10">
					{{ Form::select('ustadz_gender',
						['P' => 'Pria', 'W' => 'Wanita'],
						$ustadz->ustadz_gender, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Gender --'
						]
					) }}

					@if ($errors->has('ustadz_gender'))
						<span class="help-block">
							<strong>{{ $errors->first('ustadz_gender') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group{{ $errors->has('ustadz_status') ? ' has-error' : '' }}">
				<label for="ustadz_status" class="col-sm-2 control-label">Status:</label>
				<div class="col-md-10">
					{{ Form::select('ustadz_status',
						['A' => 'A', 'N' => 'N'],
						$ustadz->ustadz_status, [
							'class' => 'form-control',
							'placeholder' => '-- Pilih Status --'
						]
					) }}

					@if ($errors->has('ustadz_status'))
						<span class="help-block">
							<strong>{{ $errors->first('ustadz_status') }}</strong>
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

	</div>
</div>
