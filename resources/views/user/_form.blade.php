<div class="row">
	<div class="col-md-9 col-sm-9 col-sm-9">
		{!! Form::model($user, ['class' => 'form-horizontal', 'files' => 'true', 'url' => $url, 'method' => $method]) !!}

		<div class="form-group @if ($errors->has('user_name')) has-error @endif">
			<label for="user_name" class="col-md-3 col-sm-3 control-label">Username:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::text('user_name', $user->user_name, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
				@if ($errors->has('user_name'))
				<span class="help-block">
					<strong>{{ $errors->first('user_name') }}</strong>
				</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('name')) has-error @endif">
			<label for="name" class="col-md-3 col-sm-3 control-label">Display Name:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Display Name']) !!}
				@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('jenis_kelamin')) has-error @endif">
			<label for="jenis_kelamin" class="col-md-3 col-sm-3 control-label">Jenis Kelamin:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::select('jenis_kelamin', ['p' => 'Pria', 'w' => 'Wanita'], $user->jenis_kelamin, ['class' => 'form-control', 'placeholder' => '- Jenis Kelamin -']) !!}
				@if ($errors->has('jenis_kelamin'))
					<span class="help-block">
						<strong>{{ $errors->first('jenis_kelamin') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('email')) has-error @endif">
			<label for="email" class="col-md-3 col-sm-3 control-label">Email Address:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('password')) has-error @endif">
			<label for="password" class="col-md-3 col-sm-3 control-label">Password:</label>
			<div class="col-md-9 col-sm-9">
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
		</div>

		<div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
			<label for="password_confirmation" class="col-md-3 col-sm-3 control-label">Confirm Password:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
				@if ($errors->has('password_confirmation'))
					<span class="help-block">
						<strong>{{ $errors->first('password_confirmation') }}</strong>
					</span>
				@endif
			</div>
		</div>

		@if (auth()->user()->isAdmin())

		<div class="form-group @if ($errors->has('user_status')) has-error @endif">
			<label for="email" class="col-md-3 col-sm-3 control-label">Role:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::select('user_status', \App\User::roleList(),  $user->user_status, ['class' => 'form-control', 'placeholder' => '-- Pilih Role --']) !!}
				@if ($errors->has('user_status'))
					<span class="help-block">
						<strong>{{ $errors->first('user_status') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('active')) has-error @endif">
			<label for="active" class="col-md-3 col-sm-3 control-label">Active:</label>
			<div class="col-md-9 col-sm-9">
				{!! Form::select('active', ['Y' => 'Yes', 'N' => 'No'], $user->active, ['class' => 'form-control']) !!}
				@if ($errors->has('active'))
					<span class="help-block">
						<strong>{{ $errors->first('active') }}</strong>
					</span>
				@endif
			</div>
		</div>

		@endif

		<div class="form-group @if ($errors->has('img')) has-error @endif">
			<label for="img" class="col-md-3 col-sm-3 control-label">Profile Picture:</label>
			<div class="col-md-9 col-sm-9">
				<input type="file" name="img" class="form-control">
				@if ($errors->has('img'))
					<span class="help-block">
						<strong>{{ $errors->first('img') }}</strong>
					</span>
				@endif
			</div>
		</div>

		<div class="form-group @if ($errors->has('profile')) has-error @endif">
			<label for="profile" class="col-md-3 col-sm-3 control-label">Profile:</label>
			<div class="col-md-9 col-sm-9">
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
			<div class="col-md-offset-3 col-sm-offset-3 col-md-9 col-sm-9">
				<button type="submit" name="save" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>

		{!! Form::close() !!}
	</div>
	<div class="col-md-3 col-sm-3 col-sm-2">
		@if ($user->img_user)
		<img class="img-responsive" src="/{{ $user->img_user }}" />
		@else
		<img class="img-responsive" src="/images/nobody.jpg" />
		@endif
	</div>
</div>
