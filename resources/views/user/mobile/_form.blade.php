{!! Form::model($user, ['files' => 'true', 'url' => $url, 'method' => $method]) !!}

<div class="form-group @if ($errors->has('user_name')) has-error @endif">
	<label for="user_name" class="control-label">Username:</label>
	{!! Form::text('user_name', $user->user_name, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
	@if ($errors->has('user_name'))
	<span class="help-block">
		<strong>{{ $errors->first('user_name') }}</strong>
	</span>
	@endif
</div>

<div class="form-group @if ($errors->has('name')) has-error @endif">
	<label for="name" class="control-label">Display Name:</label>
	{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
	@if ($errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('jenis_kelamin')) has-error @endif">
	<label for="jenis_kelamin" class="control-label">Jenis Kelamin:</label>
	{!! Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], $user->jenis_kelamin, ['class' => 'form-control', 'placeholder' => '- Jenis Kelamin -']) !!}
	@if ($errors->has('jenis_kelamin'))
		<span class="help-block">
			<strong>{{ $errors->first('jenis_kelamin') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('email')) has-error @endif">
	<label for="email" class="control-label">Email Address:</label>
	{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
	@if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('password')) has-error @endif">
	<label for="password" class="control-label">Password:</label>
	{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
	<span class="help-block">
		<strong>Kosongkan jika tidak berubah</strong>
	</span>
	@if ($errors->has('password'))
		<span class="help-block">
			<strong>{{ $errors->first('password') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
	<label for="password_confirmation" class="control-label">Confirm Password:</label>
	{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
	@if ($errors->has('password_confirmation'))
		<span class="help-block">
			<strong>{{ $errors->first('password_confirmation') }}</strong>
		</span>
	@endif
</div>

@if (auth()->user()->isAdmin())

<div class="form-group @if ($errors->has('user_status')) has-error @endif">
	<label for="email" class="control-label">Role:</label>
	{!! Form::select('user_status', \App\User::roleList(),  $user->user_status, ['class' => 'form-control', 'placeholder' => '-- Pilih Role --']) !!}
	@if ($errors->has('user_status'))
		<span class="help-block">
			<strong>{{ $errors->first('user_status') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('active')) has-error @endif">
	<label for="active" class="control-label">Active:</label>
	{!! Form::select('active', ['Y' => 'Yes', 'N' => 'No'], $user->active, ['class' => 'form-control']) !!}
	@if ($errors->has('active'))
		<span class="help-block">
			<strong>{{ $errors->first('active') }}</strong>
		</span>
	@endif
</div>

@endif

<div class="form-group @if ($errors->has('img')) has-error @endif">
	<label for="img" class="control-label">Profile Picture:</label>
	<input type="file" name="img" class="form-control">
	@if ($errors->has('img'))
		<span class="help-block">
			<strong>{{ $errors->first('img') }}</strong>
		</span>
	@endif
</div>

<div class="form-group @if ($errors->has('profile')) has-error @endif">
	<label for="profile" class="control-label">Profile:</label>
	{!! Form::textarea('profile', $user->profile, ['class' => 'summernote', 'placeholder' => 'Profile', 'rows' => 4]) !!}
	@if ($errors->has('profile'))
		<span class="help-block">
			<strong>{{ $errors->first('profile') }}</strong>
		</span>
	@endif
</div>

<hr>

<div class="form-group">
	<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
</div>

{!! Form::close() !!}
