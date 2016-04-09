@extends('layouts.main')

@section('content')

<h1>Apa hukum menikahi wanita sekampung?</h1><hr />
<div class="row">
	<div class="col-md-8">

		<div class="alert alert-danger">
			<h4>Pertanyaan:</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<br />
			<b>Selasa, 20 April 2016 12:45 | Ikhwan</b>
		</div>

		<div class="alert alert-info">
			<h4>Jawaban:</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<br />
			<b>Selasa, 20 April 2016 12:45 | Ustadz Abu Yasmin Al Kalisari</b>
		</div>

		<h4 class="title">PERTANYAAN TERKAIT</h4>
		@for ($i=0;$i<=3;$i++)
		<a href="/tanya/show"><h4>Apa hukum menikahi wanita sekampung?</h4></a>
		<b class="text-muted">Selasa, 20 April 2016 12:45 | Ikhwan</b>
		@endfor
		
	</div>

	<div class="col-md-4">
		@include('home.sidebar')
	</div>
</div>



@stop
