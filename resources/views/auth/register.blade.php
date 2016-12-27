@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="row">
		<div class="col-md-9 hidden-xs">
			@include('auth._promo')
		</div>

        <div class="col-sm-3 col-md-3">
			@include('auth._form-register')
        </div>
    </div>
@endsection
