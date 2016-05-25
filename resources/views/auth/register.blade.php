@extends('layouts.main')

@section('title', 'Register')

@section('content')
<br>
    <div class="row">
		<div class="col-md-9">
			@include('auth._promo')
		</div>

        <div class="col-md-3">
			@include('auth._form-register')
        </div>
    </div>
@endsection
