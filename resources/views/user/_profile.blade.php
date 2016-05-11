<div class="row">
	<div class="col-md-7">
		{!! Form::model($user, [
			'class' => 'form-horizontal',
			'files' => 'true',
			'url' => '/user/'.$user->id,
			'method' => 'PUT'
		]) !!}

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

		<div class="form-group @if ($errors->has('profile')) has-error @endif">
			<label for="profile" class="col-md-3 control-label">Profile:</label>
			<div class="col-md-9">
				{!! Form::textarea('profile', $user->profile, ['class' => 'form-control', 'placeholder' => 'Profile', 'rows' => 4]) !!}
				@if ($errors->has('profile'))
					<span class="help-block">
						<strong>{{ $errors->first('profile') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('img_user')) has-error @endif">
			<label for="img_user" class="col-md-3 control-label">Profile Picture:</label>
			<div class="col-md-9">
				{!! Form::file('img_user') !!}
				@if ($errors->has('img_user'))
					<span class="help-block">
						<strong>{{ $errors->first('img_user') }}</strong>
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
</div>
