@extends('layouts.main')

@section('content')
<br>
    <div class="row">
		<div class="col-md-8">
			<div class="jumbotron">
				<h2>Mari bergabung bersama SalamDakwah untuk mendapatkan manfaat lebih.</h2>
				<span class="pull-right"><img src="/images/logo.png" alt="" /></span>
				<hr>
				<ul>
					<li>Tanya langsung masalah keislaman dengan narasumber yang berkompeten di bidangnya</li>
					<li>Iklankan produk Anda di Salwa Market</li>
					<li>Berinteraksi dengan {{ \App\User::active()->count() }} member aktif di Salwa Forum</li>
					<li>Berlangganan artikel yang ditulis langsung oleh para asatidz Ahlussunnah Wal Jama'ah</li>
				</ul>

			</div>
		</div>

        <div class="col-md-4">

			<div class="panel panel-blue">
				<div class="panel-heading">
					<h3 class="panel-title">LOGIN</h3>
				</div>
				<div class="panel-body">
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
		                    <button type="submit" class="btn btn-primary">
		                        <i class="fa fa-btn fa-sign-in"></i> Login
		                    </button>

		                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
		                </div>
		            </form>
				</div>
			</div>

            <div class="panel panel-blue">
                <div class="panel-heading">REGISTER</div>
                <div class="panel-body">
                    <form class="form-vertical" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

						<hr>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-edit"></i> Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
