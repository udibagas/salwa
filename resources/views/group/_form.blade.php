<div class="row">
	<div class="col-sm-9">
		{!! Form::model($group, ['url' => $url, 'method' => $method, 'class' => 'form-horizontal', 'files' => true]) !!}

			<div class="form-group @if ($errors->has('group_name')) has-error @endif">
				<label for="group_name" class="col-sm-3 control-label">Group Name:</label>
				<div class="col-sm-9">
					{!! Form::text('group_name', $group->group_name, ['class' => 'form-control', 'placeholder' => 'Group Name']) !!}
					@if ($errors->has('group_name'))
					<span class="help-block">
						<strong>{{ $errors->first('group_name') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('type')) has-error @endif">
				<label for="type" class="col-sm-3 control-label">Type:</label>
				<div class="col-sm-9">
					{!! Form::select('type', \App\Group::typeList(), $group->type, ['class' => 'form-control', 'placeholder' => '- Type -']) !!}
					@if ($errors->has('type'))
						<span class="help-block">
							<strong>{{ $errors->first('type') }}</strong>
						</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('img')) has-error @endif">
				<label for="img" class="col-sm-3 control-label">Gambar:</label>
				<div class="col-sm-9">
					<input type="file" name="img" class="form-control">
					@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group @if ($errors->has('description')) has-error @endif">
				<label for="description" class="col-sm-3 control-label">Description:</label>
				<div class="col-sm-9">
					{!! Form::textarea('description', $group->description, ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4]) !!}
					@if ($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif
				</div>
			</div>

			@if ($group->group_id > 0)
			<div class="form-group @if ($errors->has('delete')) has-error @endif">
				<label for="delete" class="col-sm-3 control-label">Deleted:</label>
				<div class="col-sm-9">
					{!! Form::select('delete', ['Y' => 'Yes', 'N' => 'No'], $group->delete, ['class' => 'form-control', 'placeholder' => '- Deleted -']) !!}
					@if ($errors->has('delete'))
						<span class="help-block">
							<strong>{{ $errors->first('delete') }}</strong>
						</span>
					@endif
				</div>
			</div>
			@endif

			<hr>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</div>

		{!! Form::close() !!}
	</div>
	<div class="col-sm-3">
		@if ($group->img_group)
		<img src="/{{ $group->img_group }}" class="img-responsive" alt="" />
		@endif
	</div>
</div>
