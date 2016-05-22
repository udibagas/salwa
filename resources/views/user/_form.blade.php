<div class="row">
	<div class="col-md-9">
		{!! Form::model($user, ['class' => 'form-horizontal', 'files' => 'true', 'url' => $url, 'method' => $method]) !!}

		<div class="form-group @if ($errors->has('user_name')) has-error @endif">
			<label for="user_name" class="col-md-3 control-label">Username:</label>
			<div class="col-md-9">
				{!! Form::text('user_name', $user->user_name, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
				@if ($errors->has('user_name'))
				<span class="help-block">
					<strong>{{ $errors->first('user_name') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('name')) has-error @endif">
			<label for="name" class="col-md-3 control-label">Display Name:</label>
			<div class="col-md-9">
				{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('jenis_kelamin')) has-error @endif">
			<label for="jenis_kelamin" class="col-md-3 control-label">Jenis Kelamin:</label>
			<div class="col-md-9">
				{!! Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], $user->jenis_kelamin, ['class' => 'form-control', 'placeholder' => '- Jenis Kelamin -']) !!}
				@if ($errors->has('jenis_kelamin'))
					<span class="help-block">
						<strong>{{ $errors->first('jenis_kelamin') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label for="email" class="col-md-3 control-label">Email Address:</label>
			<div class="col-md-9">
				{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label for="email" class="col-md-3 control-label">Role:</label>
			<div class="col-md-9">
				{!! Form::select('user_status', \App\User::roleList(),  $user->user_status, ['class' => 'form-control']) !!}
				@if ($errors->has('user_status'))
					<span class="help-block">
						<strong>{{ $errors->first('user_status') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('password')) has-error @endif">
			<label for="password" class="col-md-3 control-label">Password:</label>
			<div class="col-md-9">
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('confirm')) has-error @endif">
			<label for="confirm" class="col-md-3 control-label">Confirm Password:</label>
			<div class="col-md-9">
				{!! Form::password('confirm', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
				@if ($errors->has('confirm'))
					<span class="help-block">
						<strong>{{ $errors->first('confirm') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('active')) has-error @endif">
			<label for="active" class="col-md-3 control-label">Active:</label>
			<div class="col-md-9">
				{!! Form::select('active', ['Y' => 'Yes', 'N' => 'No'], $user->active, ['class' => 'form-control']) !!}
				@if ($errors->has('active'))
					<span class="help-block">
						<strong>{{ $errors->first('active') }}</strong>
					</span>
				@endif
			</div>
		</div>


		<div class="form-group @if ($errors->has('img_user')) has-error @endif">
			<label for="img_user" class="col-md-3 control-label">Profile Picture:</label>
			<div class="col-md-9">
				<input type="file" name="img" class="form-control">
				@if ($errors->has('img_user'))
					<span class="help-block">
						<strong>{{ $errors->first('img_user') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('profile')) has-error @endif">
			<label for="profile" class="col-md-3 control-label">Profile:</label>
			<div class="col-md-9">
				{!! Form::textarea('profile', $user->profile, ['class' => 'summernote', 'placeholder' => 'Profile', 'rows' => 4]) !!}
				@if ($errors->has('profile'))
					<span class="help-block">
						<strong>{{ $errors->first('profile') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<hr>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-3">
		<img src="/{{ $user->img_user }}" class="img-responsive" alt="" />
	</div>
</div>
