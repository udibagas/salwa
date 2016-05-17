{!! Form::model($group, ['url' => $url, 'method' => $method, 'class' => 'form-horizontal']) !!}

	<div class="form-group @if ($errors->has('group_name')) has-error @endif">
		<label for="group_name" class="col-md-3 control-label">Group Name:</label>
		<div class="col-md-9">
			{!! Form::text('group_name', $group->group_name, ['class' => 'form-control', 'placeholder' => 'Group Name']) !!}
			@if ($errors->has('group_name'))
			<span class="help-block">
				<strong>{{ $errors->first('group_name') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group @if ($errors->has('type')) has-error @endif">
		<label for="type" class="col-md-3 control-label">Type:</label>
		<div class="col-md-9">
			{!! Form::select('type', \App\Group::typeList(), $group->type, ['class' => 'form-control', 'placeholder' => '- Type -']) !!}
			@if ($errors->has('type'))
				<span class="help-block">
					<strong>{{ $errors->first('type') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group @if ($errors->has('description')) has-error @endif">
		<label for="description" class="col-md-3 control-label">Description:</label>
		<div class="col-md-9">
			{!! Form::textarea('description', $group->description, ['class' => 'form-control', 'placeholder' => 'Profile', 'rows' => 4]) !!}
			@if ($errors->has('description'))
				<span class="help-block">
					<strong>{{ $errors->first('description') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<hr>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
		</div>
	</div>

{!! Form::close() !!}
