@extends('layouts.main')

@section('content')

	<h1 class="title">TANYA USTADZ</h1>

	<div class="row">
		<div class="col-md-8">
			@for ($i=0;$i<=10;$i++)
				<div class="alert alert-info">
					<h3><a href="/tanya/show">Apakah hukum menikahi wanita sekampung?</a></h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p><br />
					<b>Senin, 21 Maret 2016 14:45 | Ikhwan</b>
				</div>
			@endfor
		</div>
		<div class="col-md-4">
			@include('home.sidebar')
		</div>
	</div>

@stop
