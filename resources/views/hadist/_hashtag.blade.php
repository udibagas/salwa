<h4 class="title">HASHTAG HADIST</h4>
{!! Form::open(['url' => url()->current(), 'method' => 'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ Request::get('search') }}" placeholder="Search Doa" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/hadist?search=Aqidah" class="list-group-item"><i class="fa fa-hashtag"></i> Aqidah</a>
	<a href="/hadist?search=Aqiqah" class="list-group-item"><i class="fa fa-hashtag"></i> Aqiqah</a>
	<a href="/hadist?search=Bid'ah" class="list-group-item"><i class="fa fa-hashtag"></i> Bid'ah</a>
	<a href="/hadist?search=Do'a" class="list-group-item"><i class="fa fa-hashtag"></i> Do'a</a>
	<a href="/hadist?search=Dzikir" class="list-group-item"><i class="fa fa-hashtag"></i> Dzikir</a>
	<a href="/hadist?search=Fiqh" class="list-group-item"><i class="fa fa-hashtag"></i> Fiqh</a>
	<a href="/hadist?search=Hadas" class="list-group-item"><i class="fa fa-hashtag"></i> Hadas</a>
	<a href="/hadist?search=Hadith" class="list-group-item"><i class="fa fa-hashtag"></i> Hadith</a>
	<a href="/hadist?search=Haji" class="list-group-item"><i class="fa fa-hashtag"></i> Haji</a>
	<a href="/hadist?search=Hukum" class="list-group-item"><i class="fa fa-hashtag"></i> Hukum</a>
	<a href="/hadist?search=Ibadah" class="list-group-item"><i class="fa fa-hashtag"></i> Ibadah</a>
	<a href="/hadist?search=Ihsan" class="list-group-item"><i class="fa fa-hashtag"></i> Ihsan</a>
	<a href="/hadist?search=Iman" class="list-group-item"><i class="fa fa-hashtag"></i> Iman</a>
	<a href="/hadist?search=Islam" class="list-group-item"><i class="fa fa-hashtag"></i> Islam</a>
	<a href="/hadist?search=Jenazah" class="list-group-item"><i class="fa fa-hashtag"></i> Jenazah</a>
	<a href="/hadist?search=Janabah" class="list-group-item"><i class="fa fa-hashtag"></i> Janabah</a>
	<a href="/hadist?search=Kontemporer" class="list-group-item"><i class="fa fa-hashtag"></i> Kontemporer</a>
	<a href="/hadist?search=Mayit" class="list-group-item"><i class="fa fa-hashtag"></i> Mayit</a>
	<a href="/hadist?search=Muamalah" class="list-group-item"><i class="fa fa-hashtag"></i> Muamalah</a>
	<a href="/hadist?search=Najis" class="list-group-item"><i class="fa fa-hashtag"></i> Najis</a>
	<a href="/hadist?search=Nikah" class="list-group-item"><i class="fa fa-hashtag"></i> Nikah</a>
	<a href="/hadist?search=Puasa" class="list-group-item"><i class="fa fa-hashtag"></i> Puasa</a>
	<a href="/hadist?search=Poligami" class="list-group-item"><i class="fa fa-hashtag"></i> Poligami</a>
	<a href="/hadist?search=Qurban" class="list-group-item"><i class="fa fa-hashtag"></i> Qurban</a>
	<a href="/hadist?search=Rujuk" class="list-group-item"><i class="fa fa-hashtag"></i> Rujuk</a>
	<a href="/hadist?search=Shalat" class="list-group-item"><i class="fa fa-hashtag"></i> Shalat</a>
	<a href="/hadist?search=Shaum" class="list-group-item"><i class="fa fa-hashtag"></i> Shaum</a>
	<a href="/hadist?search=Sunnah" class="list-group-item"><i class="fa fa-hashtag"></i> Sunnah</a>
	<a href="/hadist?search=Talak" class="list-group-item"><i class="fa fa-hashtag"></i> Talak</a>
	<a href="/hadist?search=Ta'addud" class="list-group-item"><i class="fa fa-hashtag"></i> Ta'addud</a>
	<a href="/hadist?search=Tauhid" class="list-group-item"><i class="fa fa-hashtag"></i> Tauhid</a>
	<a href="/hadist?search=Thaharah" class="list-group-item"><i class="fa fa-hashtag"></i> Thaharah</a>
	<a href="/hadist?search=Umrah" class="list-group-item"><i class="fa fa-hashtag"></i> Umrah</a>
	<a href="/hadist?search=Waris" class="list-group-item"><i class="fa fa-hashtag"></i> Waris</a>
	<a href="/hadist?search=Zakat" class="list-group-item"><i class="fa fa-hashtag"></i> Zakat</a>
</div>
