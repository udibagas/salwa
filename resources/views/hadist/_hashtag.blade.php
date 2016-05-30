<h4 class="title">HASHTAG HADIST</h4>
{!! Form::open(['url' => url()->current(), 'method' => 'GET']) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" name="search" value="{{ request('search') }}" placeholder="Search Doa" class="form-control">
			<div class="input-group-addon"><i class="fa fa-search"></i></div>
		</div>
	</div>
{!! Form::close() !!}

<div class="list-group hidden-xs">
	<a href="/hadist?search=Aqidah" class="list-group-item">Aqidah</a>
	<a href="/hadist?search=Aqiqah" class="list-group-item">Aqiqah</a>
	<a href="/hadist?search=Bid'ah" class="list-group-item">Bid'ah</a>
	<a href="/hadist?search=Do'a" class="list-group-item">Do'a</a>
	<a href="/hadist?search=Dzikir" class="list-group-item">Dzikir</a>
	<a href="/hadist?search=Fiqh" class="list-group-item">Fiqh</a>
	<a href="/hadist?search=Hadas" class="list-group-item">Hadas</a>
	<a href="/hadist?search=Hadith" class="list-group-item">Hadith</a>
	<a href="/hadist?search=Haji" class="list-group-item">Haji</a>
	<a href="/hadist?search=Hukum" class="list-group-item">Hukum</a>
	<a href="/hadist?search=Ibadah" class="list-group-item">Ibadah</a>
	<a href="/hadist?search=Ihsan" class="list-group-item">Ihsan</a>
	<a href="/hadist?search=Iman" class="list-group-item">Iman</a>
	<a href="/hadist?search=Islam" class="list-group-item">Islam</a>
	<a href="/hadist?search=Jenazah" class="list-group-item">Jenazah</a>
	<a href="/hadist?search=Janabah" class="list-group-item">Janabah</a>
	<a href="/hadist?search=Kontemporer" class="list-group-item">Kontemporer</a>
	<a href="/hadist?search=Mayit" class="list-group-item">Mayit</a>
	<a href="/hadist?search=Muamalah" class="list-group-item">Muamalah</a>
	<a href="/hadist?search=Najis" class="list-group-item">Najis</a>
	<a href="/hadist?search=Nikah" class="list-group-item">Nikah</a>
	<a href="/hadist?search=Puasa" class="list-group-item">Puasa</a>
	<a href="/hadist?search=Poligami" class="list-group-item">Poligami</a>
	<a href="/hadist?search=Qurban" class="list-group-item">Qurban</a>
	<a href="/hadist?search=Rujuk" class="list-group-item">Rujuk</a>
	<a href="/hadist?search=Shalat" class="list-group-item">Shalat</a>
	<a href="/hadist?search=Shaum" class="list-group-item">Shaum</a>
	<a href="/hadist?search=Sunnah" class="list-group-item">Sunnah</a>
	<a href="/hadist?search=Talak" class="list-group-item">Talak</a>
	<a href="/hadist?search=Ta'addud" class="list-group-item">Ta'addud</a>
	<a href="/hadist?search=Tauhid" class="list-group-item">Tauhid</a>
	<a href="/hadist?search=Thaharah" class="list-group-item">Thaharah</a>
	<a href="/hadist?search=Umrah" class="list-group-item">Umrah</a>
	<a href="/hadist?search=Waris" class="list-group-item">Waris</a>
	<a href="/hadist?search=Zakat" class="list-group-item">Zakat</a>
</div>
