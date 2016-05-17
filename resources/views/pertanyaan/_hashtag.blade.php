<h4 class="title hidden-xs"> Hashtag Pertanyaan</h4>
@if (auth()->check())
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

{!! Form::open(['url' => '/pertanyaan', 'method' => 'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Pertanyaan" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/pertanyaan?search=Aqidah" class="list-group-item"><i class="fa fa-hashtag"></i> Aqidah</a>
	<a href="/pertanyaan?search=Aqiqah" class="list-group-item"><i class="fa fa-hashtag"></i> Aqiqah</a>
	<a href="/pertanyaan?search=Bid'ah" class="list-group-item"><i class="fa fa-hashtag"></i> Bid'ah</a>
	<a href="/pertanyaan?search=Do'a" class="list-group-item"><i class="fa fa-hashtag"></i> Do'a</a>
	<a href="/pertanyaan?search=Dzikir" class="list-group-item"><i class="fa fa-hashtag"></i> Dzikir</a>
	<a href="/pertanyaan?search=Fiqh" class="list-group-item"><i class="fa fa-hashtag"></i> Fiqh</a>
	<a href="/pertanyaan?search=Hadas" class="list-group-item"><i class="fa fa-hashtag"></i> Hadas</a>
	<a href="/pertanyaan?search=Hadith" class="list-group-item"><i class="fa fa-hashtag"></i> Hadith</a>
	<a href="/pertanyaan?search=Haji" class="list-group-item"><i class="fa fa-hashtag"></i> Haji</a>
	<a href="/pertanyaan?search=Hukum" class="list-group-item"><i class="fa fa-hashtag"></i> Hukum</a>
	<a href="/pertanyaan?search=Ibadah" class="list-group-item"><i class="fa fa-hashtag"></i> Ibadah</a>
	<a href="/pertanyaan?search=Ihsan" class="list-group-item"><i class="fa fa-hashtag"></i> Ihsan</a>
	<a href="/pertanyaan?search=Iman" class="list-group-item"><i class="fa fa-hashtag"></i> Iman</a>
	<a href="/pertanyaan?search=Islam" class="list-group-item"><i class="fa fa-hashtag"></i> Islam</a>
	<a href="/pertanyaan?search=Jenazah" class="list-group-item"><i class="fa fa-hashtag"></i> Jenazah</a>
	<a href="/pertanyaan?search=Janabah" class="list-group-item"><i class="fa fa-hashtag"></i> Janabah</a>
	<a href="/pertanyaan?search=Kontemporer" class="list-group-item"><i class="fa fa-hashtag"></i> Kontemporer</a>
	<a href="/pertanyaan?search=Mayit" class="list-group-item"><i class="fa fa-hashtag"></i> Mayit</a>
	<a href="/pertanyaan?search=Muamalah" class="list-group-item"><i class="fa fa-hashtag"></i> Muamalah</a>
	<a href="/pertanyaan?search=Najis" class="list-group-item"><i class="fa fa-hashtag"></i> Najis</a>
	<a href="/pertanyaan?search=Nikah" class="list-group-item"><i class="fa fa-hashtag"></i> Nikah</a>
	<a href="/pertanyaan?search=Puasa" class="list-group-item"><i class="fa fa-hashtag"></i> Puasa</a>
	<a href="/pertanyaan?search=Poligami" class="list-group-item"><i class="fa fa-hashtag"></i> Poligami</a>
	<a href="/pertanyaan?search=Qurban" class="list-group-item"><i class="fa fa-hashtag"></i> Qurban</a>
	<a href="/pertanyaan?search=Rujuk" class="list-group-item"><i class="fa fa-hashtag"></i> Rujuk</a>
	<a href="/pertanyaan?search=Shalat" class="list-group-item"><i class="fa fa-hashtag"></i> Shalat</a>
	<a href="/pertanyaan?search=Shaum" class="list-group-item"><i class="fa fa-hashtag"></i> Shaum</a>
	<a href="/pertanyaan?search=Sunnah" class="list-group-item"><i class="fa fa-hashtag"></i> Sunnah</a>
	<a href="/pertanyaan?search=Talak" class="list-group-item"><i class="fa fa-hashtag"></i> Talak</a>
	<a href="/pertanyaan?search=Ta'addud" class="list-group-item"><i class="fa fa-hashtag"></i> Ta'addud</a>
	<a href="/pertanyaan?search=Tauhid" class="list-group-item"><i class="fa fa-hashtag"></i> Tauhid</a>
	<a href="/pertanyaan?search=Thaharah" class="list-group-item"><i class="fa fa-hashtag"></i> Thaharah</a>
	<a href="/pertanyaan?search=Umrah" class="list-group-item"><i class="fa fa-hashtag"></i> Umrah</a>
	<a href="/pertanyaan?search=Waris" class="list-group-item"><i class="fa fa-hashtag"></i> Waris</a>
	<a href="/pertanyaan?search=Zakat" class="list-group-item"><i class="fa fa-hashtag"></i> Zakat</a>
</div>
