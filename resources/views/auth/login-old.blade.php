@extends('layouts.main')

@section('content')
    <div class="row" style="min-height:280px;margin-top:60px;">
		<div class="col-md-4">

		</div>
        <div class="col-md-4 text-center">
			<h4 class="title">LOGIN</h4>
            <form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Username/Email">

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

				<hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-btn fa-sign-in"></i> Login
                    </button>

                    <!-- <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a> -->
                </div>
            </form>
        </div>
    </div>
@endsection
