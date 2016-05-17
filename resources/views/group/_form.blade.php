{!! Form::model($group, ['url' => $url, 'method' => $method]) !!}

	<div class="form-group @if ($errors->has('name')) has-error @endif">
		<label for="name" class="col-md-3 control-label">Username:</label>
		<div class="col-md-9">
			{!! Form::text('name', $group->name, ['class' => 'form-control', 'placeholder' => 'Group Name']) !!}
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
		</div>
	</div>

	<div class="form-group @if ($errors->has('type')) has-error @endif">
		<label for="type" class="col-md-3 control-label">Type:</label>
		<div class="col-md-9">
			{!! Form::select('type', \App\Group::typeList(), $group->type, ['class' => 'form-control', 'placeholder' => '- Jenis Kelamin -']) !!}
			@if ($errors->has('type'))
				<span class="help-block">
					<strong>{{ $errors->first('type') }}</strong>
				</span>
			@endif
		</div>
	</div>

	<div class="form-group @if ($errors->has('description')) has-error @endif">
		<label for="description" class="col-md-3 control-label">Profile:</label>
		<div class="col-md-9">
			{!! Form::textarea('description', $group->description, ['class' => 'form-control', 'placeholder' => 'Profile', 'rows' => 4]) !!}
			@if ($errors->has('description'))
				<span class="help-block">
					<strong>{{ $errors->first('description') }}</strong>
				</span>
			@endif
		</div>
	</div>

{!! Form::close() !!}
