@extends('layouts.main')

@section('content')
	<br>
	<br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-orange">
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
                            <button type="submit" class="btn btn-orange">
                                <i class="fa fa-btn fa-user"></i> Register
                            </button>
                            <a href="/login" class="btn btn-blue"><i class="fa fa-sign-in"></i> Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
