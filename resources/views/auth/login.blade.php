@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="row">
		<div class="col-md-9 col-sm-8 hidden-xs">
			@include('auth._promo')
		</div>

        <div class="col-md-3 col-sm-4">
			@include('auth._form-login')
        </div>
    </div>
@endsection
