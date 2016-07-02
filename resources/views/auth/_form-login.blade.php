<div class="panel panel-blue" @if ($isMobile) style="margin-top:0;" @endif>
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-sign-in"></i> LOGIN</h3>
	</div>
	<form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
		{!! csrf_field() !!}
		<div class="panel-body">

			<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username/Email">

				@if ($errors->has('email'))
					<span class="help-block">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				<input type="password" class="form-control" name="password" placeholder="Password">

				@if ($errors->has('password'))
					<span class="help-block">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group">
				<div class="checkbox">
					<label>
						<input type="checkbox" name="remember"> Remember Me
					</label>
				</div>
			</div>
		</div>

		<div class="panel-footer text-center">
			<button type="submit" class="btn btn-info">
				<i class="fa fa-btn fa-sign-in"></i> Login
			</button>
			<a class="btn btn-link" href="{{ url('/password/reset') }}">Lupa Password?</a>
		</div>
	</form>
</div>
