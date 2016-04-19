<h4 class="title">SALWA RADIO</h4>
<audio controls="controls" autoplay="autoplay" preload="none" style="width:100%"><source src="http://live.radiorodja.comm/;" type="application/ogg"></source></audio>

@include('home.info')

<h4 class="title">SALWA PROMO</h4>
@include('home.banner')

<h4 class="title">DOA HARI INI</h4>
@include('home.hadist', ['hadist' => $doa])

<h4 class="title">HADITS HARI INI</h4>
@include('home.hadist', ['hadist' => $hadist])

@include('home.image')
