<div class="panel panel-primary">
	<div class="panel-heading"><i class="fa fa-edit"></i> REGISTER</div>
	{!! Form::open(['class' => 'form-vertical', 'files' => 'true', 'url' => '/register', 'method' => 'POST']) !!}
	<div class="panel-body">

		<div class="form-group @if ($errors->has('user_name')) has-error @endif">
			{!! Form::text('user_name', old('user_name'), ['class' => 'form-control', 'placeholder' => 'Username']) !!}
			@if ($errors->has('user_name'))
			<span class="help-block">
				<strong>{{ $errors->first('user_name') }}</strong>
			</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('name')) has-error @endif">
			{!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
			@if ($errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('jenis_kelamin')) has-error @endif">
			{!! Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], old('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '- Jenis Kelamin -']) !!}
			@if ($errors->has('jenis_kelamin'))
				<span class="help-block">
					<strong>{{ $errors->first('jenis_kelamin') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			{!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('password')) has-error @endif">
			{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('confirm')) has-error @endif">
			{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
			@if ($errors->has('password_confirmation'))
				<span class="help-block">
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('img')) has-error @endif">
			<input type="file" name="img" class="form-control">
			@if ($errors->has('img'))
				<span class="help-block">
					<strong>{{ $errors->first('img') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group @if ($errors->has('profile')) has-error @endif">
			{!! Form::textarea('profile', old('profile'), ['class' => 'form-control', 'placeholder' => 'Profile', 'rows' => 6]) !!}
			@if ($errors->has('profile'))
				<span class="help-block">
					<strong>{{ $errors->first('profile') }}</strong>
				</span>
			@endif
		</div>

	</div>
	<div class="panel-footer">
		<button type="submit" name="save" class="btn btn-primary"><i class="fa fa-edit"></i> Register</button>
		<a class="btn btn-info" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Login</a>
	</div>
	{!! Form::close() !!}
</div>
