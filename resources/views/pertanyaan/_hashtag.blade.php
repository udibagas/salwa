<h4 class="title hidden-xs"> Hashtag Pertanyaan</h4>
@if (Auth::check())
<p>
	<a href="/pertanyaan/create" class="btn btn-info form-control">
		<i class="fa fa-plus-circle"></i> Input Pertanyaan
	</a>
</p>
@else
	<div class="alert alert-danger text-center">
		Silakan <a href="/login">Login</a> untuk input pertanyaan.
	</div>
@endif

{!! Form::open(['url' => '/pertanyaan/search', 'method' => 'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search Pertanyaan" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}


<div class="list-group hidden-xs">
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Aqidah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Aqiqah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Bid'ah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Do'a</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Dzikir</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Fiqh</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Hadas</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Hadith</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Haji</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Hukum</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Ibadah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Ihsan</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Iman</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Islam</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Jenazah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Janabah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Kontemporer</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Mayit</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Muamalah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Najis</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Nikah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Puasa</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Poligami</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Qurban</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Rujuk</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Shalat</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Shaum</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Sunnah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Talak</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Ta'addud</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Tauhid</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Thaharah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Umrah</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Waris</a>
	<a href="#" class="list-group-item"><i class="fa fa-hashtag"></i> Zakat</a>
</div>
